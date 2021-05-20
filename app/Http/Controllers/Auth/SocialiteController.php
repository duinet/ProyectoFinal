<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Socialite;
use App\Models\User;
use Exception;


class SocialiteController extends Controller
{
    public function googleRedirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function loginWithGoogle()
    {
        try {
            $googleUser = Socialite::driver('google')->stateless()->user();
            $user = User::where('google_id', $googleUser->id)->first();
            if($user){
                if($user->estat != 1){
                    return redirect('/login')->withErrors(["Espera que l'administrador t'accepti."]);
                }else{
                    Auth::login($user);
                    return redirect('/dashboard');
                }
            }else{
                $domainMail = explode('@', $googleUser->email)[1]; 
                if($domainMail != 'inscamidemar.cat'){
                    return redirect('/login')->withErrors(["El correu per poder registrarte deu ser del domini inscamidemar.cat"]);
                }else{
                    $createUser = User::create([
                        'name' => $googleUser->name,
                        'email' => $googleUser->email,
                        'password' => encrypt('test@123'),
                        'estat' => 0,
                        'rol' => 0,
                        'google_id' => $googleUser->id
                    ]);
                    $createUser->save();
                    return redirect('/login')->withErrors(["El seu usuari a s'ha registrat correctament. Espereu a que l'administrador t'accepti."]);
                }
            }

        } catch (Exception $exception) {
            dd($exception->getMessage());
        }
    }
}

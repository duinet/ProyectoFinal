<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\Categories;
use App\Models\User;
use Hash;
use Str;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $categories = Categories::all();
        return view('auth.login', compact('categories'));
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function store(LoginRequest $request)
    {
        $captcha = $this->captchaVerify(app('request')->input('h-captcha-response')??'');

        if($captcha === true){
            $request->authenticate();
            $request->session()->regenerate();
            if (auth()->user()->estat == 0) {
                Auth::logout();
                return redirect()->back()->withErrors(["El usuari no te permisos per accedir-hi al dashboard, parli amb l'administrador"]);
            }else{
                return redirect()->intended(RouteServiceProvider::HOME);
            }
        }else{
            return redirect()->back()->withErrors(["Has d'omplir el Captcha"]);
        }

    }



    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function captchaVerify($requestCaptcha)
    {
        if($requestCaptcha == '' && $requestCaptcha == null){
            return false;
        }
        $data = array(
            'secret' => "0x822aa8cc591A460d460E0e510b71Ff04cfaD850e",
            'response' => $requestCaptcha
            // $_POST['h-captcha-response']
        );
        $verify = curl_init();
        curl_setopt($verify, CURLOPT_URL, "https://hcaptcha.com/siteverify");
        curl_setopt($verify, CURLOPT_POST, true);
        curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($verify);
        // var_dump($response);
        $responseData = json_decode($response);
        return $responseData->success;
    }
}

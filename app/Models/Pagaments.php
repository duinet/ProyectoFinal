<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use DB;


class Pagaments extends Model
{
    use HasFactory;

    protected $fillable=[
        'categoria_id',
        'usuari_id',
        'compte_id',
        'curs_id',
        'curs',
        'pagament',
        'descripcio',
        'preu',
        'data_fi',
        'estat',
    ];

    public static function disablePagaments()
    {
        DB::table('pagaments')
              ->where('data_fi', '<', date('Y-m-d'))
              ->update(['estat' => 0]);
    } 
}

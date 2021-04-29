<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


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
}

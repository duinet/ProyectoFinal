<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pagaments;


class Comptes extends Model
{
    use HasFactory;

    protected $fillable=[
        'compte',
        'fuc',
        'clau',
        'usuari_id'
    ];

    public function pagaments()
    {
        return $this->hasMany(Pagaments::class);
    }
}

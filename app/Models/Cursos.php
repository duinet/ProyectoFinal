<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Pagaments;

class Cursos extends Model
{
    use HasFactory;

    protected $fillable=[
        'curs',
        'usuari_id'
    ];

    public function pagaments()
    {
        return $this->hasMany(Pagaments::class);
    }
}

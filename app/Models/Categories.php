<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Pagaments;

class Categories extends Model
{
    use HasFactory;

    protected $fillable=[
        'categoria',
        'usuari_id'
    ];

    public function pagaments()
    {
        return $this->hasMany(Pagaments::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Firmas extends Model
{
    use HasFactory;
    protected $fillable = [
        'imagen',
        'name',
        'puesto',
        'telefono',
        'celular',
        'email',
        'facebook',
        'linkedin',
        'instagram',
        'twitter'
    ];
}

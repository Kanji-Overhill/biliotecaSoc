<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archivos extends Model
{
    use HasFactory;

    protected $fillable = [
    	'nombre',
    	'url',
    	'imagen',
    	'categoria',
    	'tipo',
    	'descripcion',
        'reigstro_id'
    ];
}

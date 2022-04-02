<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class presentacion extends Model
{
    use HasFactory;
    protected $table='presentacions';
    protected $fillable= [
    'descripcion',
    'tipo',
    'forma',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class venta extends Model
{
    use HasFactory;
    protected $table='ventas';
    protected $fillable= [
    'cantidad',
    'fecha',
    'hora',
    'valor_venta',
    ];
}

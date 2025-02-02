<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Empleado extends Model
{
    use HasFactory, SoftDeletes;    
    protected $fillable = ['nombre','codigo','salario_dolares','salario_pesos','direccion','estado','ciudad','celular','correo','activo','eliminado'];
}

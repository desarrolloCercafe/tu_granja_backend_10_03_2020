<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MateriasPrimasRegistro extends Model
{
    protected $table = 'proveedores_materias_primas';
    protected $fillable = [
        'id', 'nit', 'nombre',  
        'created_at', 'updated_at'
    ];
}

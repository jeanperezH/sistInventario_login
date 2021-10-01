<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Informacion extends Model
{
    protected $table ='informaciones';
    protected $fillable = [
        'id_producto',
        'periodo',
        'ruc',
        'apellidos_nombres_dr',
        'establecimiento',
        'codigo_existencia',
        'tipo_existencia',
        'descripcion',
        'unidad_medida',
        'metodo_valuacion',
    ];
    public $timestamps = false;
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    /**
     * The table associated with the model.
     * "TABLA ASOCIADA CON EL MODELO"
     * @var string
     */
    protected $table = 'empresa';

    protected $fillable = [
    	'nombre',
        'razon_social',
        'rfc',
        'calle',
        'numero',
        'colonia',
        'codigo_postal',
        'pais',
        'estado',
        'ciudad'
    ];

    public $timestamps = false;
}

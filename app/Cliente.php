<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    /**
     * The table associated with the model.
     * "TABLA ASOCIADA CON EL MODELO"
     * @var string
     */
    protected $table = 'cliente';

    protected $fillable = [
    	'nombre',
        'apellido_paterno',
        'apellido_materno',
        'email',
        'telefono',
        'tipo_cliente'
    ];

    public $timestamps = false;
}

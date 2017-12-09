<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    /**
     * The table associated with the model.
     * "TABLA ASOCIADA CON EL MODELO"
     * @var string
     */
    protected $table = 'empleado';

    protected $fillable = [
    	'nombre',
        'apellido_paterno',
        'apellido_materno',
        'email',
        'password'
    ];

    public $timestamps = false;
}
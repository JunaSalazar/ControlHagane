<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Avance extends Model
{
    /**
     * The table associated with the model.
     * "TABLA ASOCIADA CON EL MODELO"
     * @var string
     */
    protected $table = 'documentacion';

    protected $fillable = [
    	'nombre',
        'comentario'
    ];

    public $timestamps = false;
}
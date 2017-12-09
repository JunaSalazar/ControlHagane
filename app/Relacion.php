<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Relacion extends Model
{
    /**
     * The table associated with the model.
     * "TABLA ASOCIADA CON EL MODELO"
     * @var string
     */
    protected $table = 'role_user';

    // ESTO ES PARA NO CONTEMPLE AUTOINCREMENTO DEL ID
    public $incrementing = false;

    public $timestamps = false;
}
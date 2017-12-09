<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriaVehiculo extends Model
{
    protected $table = 'categoria_vehiculo';

    protected $primarykey = 'cod';

    public $timestamps = false;

    protected $fillable = [
    	'nombre'
    	
    ];
}

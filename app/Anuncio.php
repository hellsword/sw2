<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anuncio extends Model
{
    protected $table = 'anuncio';

    protected $primarykey = 'id_anuncio';

    public $timestamps = false;

    protected $fillable = [
    	'titulo', 'descripcion', 'condicion', 'rut', 'patente', 'precio_serv', 'region', 'comuna', 'provincia','forma_pago', 'id_categoria', 'tipo_servicio'
    	
    ];
}

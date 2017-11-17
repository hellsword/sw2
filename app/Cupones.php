<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cupones extends Model
{
    protected $table = 'cupones';

    protected $primarykey = 'id_anuncio';

    public $timestamps = false;

    protected $fillable = [
    	'cupon','id_cliente'
    	
    ];
}

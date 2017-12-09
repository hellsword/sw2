<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategoria extends Model
{
    protected $table = 'sub_categorias';

    protected $primarykey = 'id_categoria';

    public $timestamps = false;

    protected $fillable = [
    	'sub_categoria', 'nombre_completo'
    	
    ];
}

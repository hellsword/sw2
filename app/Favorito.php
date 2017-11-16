<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorito extends Model
{
    protected $table = 'favoritos';

    protected $primarykey = 'id_cliente, id_anuncio';

    public $timestamps = false;
}

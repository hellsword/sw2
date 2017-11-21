<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forma_pago extends Model
{
    protected $table = 'forma_pago';

    protected $primarykey = 'num_pago';

    public $timestamps = false;

    protected $fillable = [
    	'modo', 'fecha_pago'
    	
    ];
}

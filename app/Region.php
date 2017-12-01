<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $table = 'region';

    protected $primarykey = 'REGION_ID';

    public $timestamps = false;

    protected $fillable = [
    	'REGION_NOMBRE', '	ISO_3166_2_CL'
    	
    ];
}

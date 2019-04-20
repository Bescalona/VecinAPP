<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vecino extends Model
{
	protected $table = 'vecino';
    public $timestamps = false;
    protected $primaryKey = 'id_vecino'; 
    
}

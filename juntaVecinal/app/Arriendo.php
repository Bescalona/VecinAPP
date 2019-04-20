<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Arriendo extends Model
{
    protected $table = 'arriendo';
    public $timestamps = false;
    protected $primaryKey = 'id_arriendo'; 
    
}

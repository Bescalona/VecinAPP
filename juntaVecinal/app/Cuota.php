<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cuota extends Model
{
    protected $table = 'cuota';
    public $timestamps = false;
    protected $primaryKey = 'id_cuota'; 
}

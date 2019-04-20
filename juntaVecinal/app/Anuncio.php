<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anuncio extends Model
{
    protected $table = 'anuncio';
    public $timestamps = false;
    protected $primaryKey = 'id_anuncio'; 
}

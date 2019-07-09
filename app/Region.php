<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
   

public function rooms(){

// Campos que se deben llenar
//protected $fillable = ['nombre', 'codigo', 'responsable'];


   	return $this->hasMany('App\Room');
   
   }

}

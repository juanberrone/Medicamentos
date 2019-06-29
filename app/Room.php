<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    //

//Redefino el tamaño de Id 
   //protected $keyType = bigInteger('20');


   public function users(){

   	return $this->hasMany('App\User');
   
   }


}



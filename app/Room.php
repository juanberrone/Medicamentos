<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    //

//Redefino el tamaño de Id 
   //protected $keyType = bigInteger('20');


   public function users(){

   	return $this->belongsToMany('App\User')
        ->withTimestamps();
   
   }

   public function region()
    {
        return $this
            ->belongsTo('App\Region')
            ->withTimestamps();
            
    }

    public function stocks(){

    return $this->belongsToMany('App\Stock')
        ->withTimestamps();
   
   }

    public function movements(){

    return $this->belongsToMany('App\Movement')
        ->withTimestamps();
   
   }

   public function ingresoVacunas(){

    return $this->belongsToMany('App\ingresoVacunas')
        ->withTimestamps();
   
   }



}



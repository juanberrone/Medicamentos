<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
       /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'nombre', 'codigo', 'unidad', 'requiereDescartable', 'dosis', 'descartables',
    ];



    public function stocks(){



   	return $this->hasMany('App\Stock');
   
   }


   public function details(){

   	return $this->hasMany('App\Detail');
   
   }


   public function ingresoVacunasDetalle(){

    return $this->hasMany('App\IngresoVacunasDetalle');
   
   }
}

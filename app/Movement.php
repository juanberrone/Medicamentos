<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movement extends Model
{
    
	protected $fillable = [

       'remito', 'autor', 'estado', 'observaciones', 'tipo', 'room_id', 
    ];



    public function room()
    {
        return $this
            ->belongsTo('App\Room')
            ->withTimestamps();
            
    }

     public function details(){

   	return $this->hasMany('App\Detail');
   
   }

}

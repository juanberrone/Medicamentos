<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
 

   protected $fillable = [
       'cantidad', 'cantidadEnTraslado', 'cantidadMinima',
    ];  
  


   public function room()
    {
        return $this
            ->belongsTo('App\Room')
            ->withTimestamps();
            
    }

	public function product()
    {
        return $this
            ->belongsTo('App\Product')
            ->withTimestamps();
            
    }


}

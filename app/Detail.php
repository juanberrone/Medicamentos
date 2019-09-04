<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    

	protected $fillable = [

       'cantidad', 'movement_id',  'product_id', 
    ];


    public function product()
    {
        return $this
            ->belongsTo('App\Product')
            ->withTimestamps();
            
    }

    public function movement()
    {
        return $this
            ->belongsTo('App\Movement')
            ->withTimestamps();
            
    }


}

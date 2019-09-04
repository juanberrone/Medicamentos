<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Stock;
use DB;
use Auth;

class RoomController extends Controller
{
    

   public function getRoom($id)
    {
         $user = Auth::user();

         $stocks;

        $roleUser = DB::table('role_user')->where('user_id', $user->id )->first();
        $role = DB::table('roles')->where('id', $roleUser->role_id )->first();
        $perfil = $role->nombre; 
        
        //Obtener las salas de un Usuario    

       $salas = DB::table('room_user')->where('user_id', $user->id )
                 ->join('rooms', 'room_user.room_id', '=', 'rooms.id')
                 ->select('rooms.*')
                 ->get();


        
        $sala = DB::table('rooms')->where('id', $id )->first();


        $productos = DB::table('products')->select('products.nombre')->get();
        $productosChats = $productos->toArray();
                    

         

		if (!$salas->isEmpty()) {

 			$stocks = DB::table('stocks')->where('room_id', $id )
 				->join('products', 'stocks.product_id', '=', 'products.id')
                 ->select('stocks.*','products.*')
                 ->get();

            

             return view('Stock.index',compact("stocks","perfil","salas","sala","productosChats"));

    } else {
        dd('vacia');
    }
 
    }
}

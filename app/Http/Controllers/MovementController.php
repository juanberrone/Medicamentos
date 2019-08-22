<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Movement;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;
use DB;

class MovementController extends Controller
{
    

	 public function index(Request $request)
    {


        $request->user()->authorizeRoles([ 'admin']);
        $user = Auth::user();
        $user1 = DB::table('role_user')->where('user_id', $user->id )->first();
        //var_dump($user1->role_id);
        $user1 = DB::table('roles')->where('id', $user1->role_id )->first();
        $perfil = $user1->nombre;
        //var_dump($user1);

        $movements=Movement::orderBy('id','DESC')->paginate(10);


		$salas = DB::table('room_user')->where('user_id', $user->id )
                 ->join('rooms', 'room_user.room_id', '=', 'rooms.id')
                 ->select('rooms.*')
                 ->get();




        return view('Movement.index',compact("movements","perfil","salas"));
    }

    public function create(Request $request)
    {

        //Id Sala Central

        $salaCentral = '1';
        $request->user()->authorizeRoles(['user', 'admin']);
        $user = Auth::user();
        $user1 = DB::table('role_user')->where('user_id', $user->id )->first();
        //var_dump($user1->role_id);
        $user1 = DB::table('roles')->where('id', $user1->role_id )->first();
        $perfil = $user1->nombre;
       

    
        //
         //$productos=Movement::orderBy('id','DESC')->paginate(3);

         $salas = DB::table('room_user')->where('user_id', $user->id )
                 ->join('rooms', 'room_user.room_id', '=', 'rooms.id')
                 ->select('rooms.*')
                 ->get();


        $salasArray = $salas->toArray();

        $stocks = DB::table('stocks')->where('room_id', $salaCentral )
                ->join('products', 'stocks.product_id', '=', 'products.id')
                 ->select('stocks.*','products.*')
                 ->get();

     


        return view('Movement.create',compact("stocks","perfil","salas","salasArray"));
    
    }


     public function store(Request $request)
    {

         $user = Auth::user();
         $userFile = DB::table('users')->where('id', $user->id )->first();

         $movimiento = DB::table('movements')->get();
         $movimientoCantidad = $movimiento->count() + 1;
         $remito = "REM";
         $nroRemito = $remito."".$movimientoCantidad;

        


        $remito = new Movement([
        'observaciones' => $request->input('observaciones'),
        'remito' => $nroRemito,
        'tipo' => "Sistema",
        'autor' => $userFile->name,
        'estado' => $request->input('estado'),
        'room_id' => $request->input('unidad'),
        
      ]);

        try {
            $remito->save();
        }
        catch(\Illuminate\Database\QueryException $ex){

           return back()->with('error','Existe un Problema al Registrar el Remito');
        }

         

       


       return back()->with('success','Item created successfully!');

        



    }







}

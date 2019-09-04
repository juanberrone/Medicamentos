<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Movement;
use App\Detail;
use App\Stock;
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

        $movements=Movement::orderBy('id','DESC')->get();


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


        $salaCentral = '1';
        
        $stocks = DB::table('stocks')->where('room_id', $salaCentral )
                ->join('products', 'stocks.product_id', '=', 'products.id')
                 ->select('stocks.*','products.*')
                 ->get();

        $user = Auth::user();
        $user1 = DB::table('role_user')->where('user_id', $user->id )->first();
        $user1 = DB::table('roles')->where('id', $user1->role_id )->first();
        $perfil = $user1->nombre;
        

        //obtenemos las salas
        $salas = DB::table('room_user')->where('user_id', $user->id )
                 ->join('rooms', 'room_user.room_id', '=', 'rooms.id')
                 ->select('rooms.*')
                 ->get();

        //las salas las transformamos en array la la Vista
        $salasArray = $salas->toArray();


        //Obtener movimientos
        $movements=Movement::orderBy('id','DESC')->get();


        //validamos que exista stock en cada pedido
        foreach ($stocks as $unidad) {


         if ($request[$unidad->codigo] != null) {
             
             if ($unidad->cantidad < $request[$unidad->codigo] ){
    
                 return back()->with('error','Por favor controle los stock disponibles');
    
             }
    
            }

        }

      

         $userFile = DB::table('users')->where('id', $user->id )->first();

         $movimiento = DB::table('movements')->get();
         $movimientoCantidad = $movimiento->count() + 1;
         $remito = "REM";
         $nroRemito = $remito."".$movimientoCantidad;

        
        $remito = new Movement([
        'observaciones' => $request->input('observaciones'),
        'remito' => $nroRemito,
        'tipo' => "Con Aprobación",
        'autor' => $userFile->name,
        'estado' => $request->input('estado'),
        'room_id' => $request->input('unidad'),
        
             ]);


        try {
           
   
        $remito->save();

            
      

   
        //una vez ok actualizamos las tablas por cada unidad pedida
         foreach ($stocks as $unidadUpdate) {

                   
                if ($request[$unidadUpdate->codigo] != null) {

                    //obtenemos codigo de producto
                    $idCodigoUpdate = DB::table('products')->where('codigo', $unidadUpdate->codigo )
                    ->select('id')
                    ->first();

                   
                    //actualizamos el stock
                    $actualizarStock = DB::table('stocks')
                    ->where('room_id','=', $salaCentral )
                    ->where('product_id','=', $idCodigoUpdate->id )
                    ->limit(1)
                    ->increment('cantidadEnTraslado', $request[$unidadUpdate->codigo]);

                    $decrementarStock = DB::table('stocks')
                    ->where('room_id','=', $salaCentral )
                    ->where('product_id','=', $idCodigoUpdate->id )
                    ->limit(1)
                   // ->increment('cantidadEnTraslado', $request[$unidadUpdate->codigo]);
                    ->decrement('cantidad', $request[$unidadUpdate->codigo]);
                   // ->update(array('cantidadEnTraslado' => 11));


                     
                    try {
                     
                      
                     $remitoDetalle = new Detail([
                         
                         'cantidad' => $request[$unidadUpdate->codigo] ,
                         'movement_id' => $remito->id,
                         'product_id' => $idCodigoUpdate->id,
                                ]);

                  

                         $remitoDetalle->save();



                        
                               
                      }

                    catch(\Illuminate\Database\QueryException $ex){

                        dd($ex);

                             return back()->with('error','Existe un Problema al Registrar el detalle del Remito');
                         }

                }        

        }   

        //   return back()->with('success','Se registro corretamente el remito.');
           return redirect()->back()->with('success','Se registro corretamente el remito.');

        }
        catch(\Illuminate\Database\QueryException $ex){

           return back()->with('error','Existe un Problema al Registrar el Remito');
        }


    }

}

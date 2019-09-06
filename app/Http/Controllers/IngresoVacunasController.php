<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Movement;
use App\Detail; 
use App\Product; 
use App\IngresoVacunas;
use App\Programa;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;
use DB;

class IngresoVacunasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['user', 'admin']);
        $user = Auth::user();
        $user1 = DB::table('role_user')->where('user_id', $user->id )->first();
        //var_dump($user1->role_id);
        $user1 = DB::table('roles')->where('id', $user1->role_id )->first();
        $perfil = $user1->nombre;
        //var_dump($user1);

       // $productos=IngresoVacunas::orderBy('id','DESC')->paginate(10);


        $productos= DB::table('ingresovacunas')->where('room_id', 1 )
                 ->join('rooms', 'ingresovacunas.room_id', '=', 'rooms.id')
                  ->join('programa', 'ingresovacunas.programa_id', '=', 'programa.id')
                 ->select('ingresovacunas.*' ,'rooms.nombre as nombresala' , 'programa.nombre as nombreprograma')
                 ->orderBy('id','DESC')->paginate(10);


               

        $salas = DB::table('room_user')->where('user_id', $user->id )
                 ->join('rooms', 'room_user.room_id', '=', 'rooms.id')
                 ->select('rooms.*')
                 ->get();




        return view('IngresoVacunas.index',compact("productos","perfil","salas"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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


        $productos = Product::orderBy('id','DESC')->get();

        $programas = Programa::orderBy('id','DESC')->get();
     


        return view('IngresoVacunas.create',compact("stocks","perfil","salas","salasArray","productos","programas"));
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

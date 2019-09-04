<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\Auth;
use DB;


class ProductController extends Controller
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

        $productos=Product::orderBy('id','DESC')->paginate(10);

        $salas = DB::table('room_user')->where('user_id', $user->id )
                 ->join('rooms', 'room_user.room_id', '=', 'rooms.id')
                 ->select('rooms.*')
                 ->get();




        return view('Product.index',compact("productos","perfil","salas"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {


        $request->user()->authorizeRoles(['user', 'admin']);
        $user = Auth::user();
        $user1 = DB::table('role_user')->where('user_id', $user->id )->first();
        //var_dump($user1->role_id);
        $user1 = DB::table('roles')->where('id', $user1->role_id )->first();
        $perfil = $user1->nombre;
       

    
        //
         $productos=Product::orderBy('id','DESC')->paginate(3);

         $salas = DB::table('room_user')->where('user_id', $user->id )
                 ->join('rooms', 'room_user.room_id', '=', 'rooms.id')
                 ->select('rooms.*')
                 ->get();


        return view('Product.create',compact("productos","perfil","salas"));
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

         
         if (  $request->input('requiereDescartable') == "on"){
                 $requiereDescartable=1;
         }
         else{

         $requiereDescartable=0;
         }

        
         print_r($requiereDescartable);

         $producto = new Product([
        'nombre' => $request->input('nombre'),
        'codigo' => $request->input('codigo'),
        'unidad' => $request->input('unidad'),
        'requiereDescartable' => $requiereDescartable,
        'dosis' => $request->input('dosis'),
        'descartables' => $request->input('descartables')
      ]);
        $producto->save();

        return redirect()->route('product.index');




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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['user', 'admin' , 'Administrador Sala']);
        $user = Auth::user();
     
     //Recupero el Role
        $roleUser = DB::table('role_user')->where('user_id', $user->id )->first();
        $role = DB::table('roles')->where('id', $roleUser->role_id )->first();
        $perfil = $role->nombre; 
    
    //Obtener las salas de un Usuario    

        $salas = DB::table('room_user')->where('user_id', $user->id )
                 ->join('rooms', 'room_user.room_id', '=', 'rooms.id')
                 ->select('rooms.*')
                 ->get();

        
        return view('homeview', compact("perfil","salas"));
    }


}

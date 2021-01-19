<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;

class adminController extends Controller
{
    protected $redirectTo = '/verify';
    
    public function mostrarAdminBlade(){

        $usuarios = App\Models\User::all();
        $tours = App\Models\Tour::all();

        return view('admin', compact('tours', 'usuarios'));
    }

    public function eliminar($id){

        $usuarioEliminar = App\Models\User::findOrFail($id);
        $usuarioEliminar->delete();
    
        return back();
    }

    public function eliminarTour($id){

        $usuarioEliminar = App\Models\Tour::findOrFail($id);
        $usuarioEliminar->delete();
    
        return back();
    }

    public function editarUsuario($id){
    
        //Aquí valida si existe sino redirije al 404
        $usuario = App\Models\User::findOrFail($id);
    
        return view('userEdit', compact('usuario'));
    }

    protected function create(Request $request)
    {
        return App\Models\User::create([
            'name' => $request->name,
            'apellido' => $request->apellido,
            'dni' => $request->dni,
            'email' => $request->email,
            'foto' => $request->originalName,
            'usuario' => $request->usuario,
            'password' => Hash::make($request->password),
            'tipo' => $request->tipo,
        ]);

        return back();
    }
}

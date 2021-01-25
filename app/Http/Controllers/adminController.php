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

        $usuario = App\Models\User::findOrFail($id);

        return view('userEdit', compact('usuario'));
    }

    protected function create(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:25'],
            'apellido' => ['required', 'string', 'max:25'],
            'dni' => ['required', 'string', 'max:9'],
            'usuario' => ['required', 'string', 'max:25'],
            'tipo' => ['required'],
            'email' => ['required', 'string', 'email', 'max:100', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        
        App\Models\User::create([
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

    public function editarPerfilAdmin(Request $data)
    {
        $updatePerfil = App\Models\User::find($data->id);
        //dd($updatePerfil->id);
        $data->validate([
        'nombre' => ['required', 'string', 'max:25'],
        'apellido' => ['required', 'string', 'max:25'],
        'dni' => ['required', 'string', 'max:9'],
        'usuario' => ['required', 'string', 'max:25'],
        'email' => "unique:users,email,{$updatePerfil->id}"
        ]);

        //$updatePerfil = App\Models\User::find($data->id);
        $updatePerfil->name = $data->nombre;
        $updatePerfil->apellido = $data->apellido;
        $updatePerfil->usuario = $data->usuario;
        $updatePerfil->dni = $data->dni;
        $updatePerfil->email = $data->email;

        $updatePerfil->save();
        return redirect('admin');
    }
}

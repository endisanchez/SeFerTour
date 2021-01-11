<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App;

class PerfilController extends Controller
{

  public function editarPerfil(Request $request)
  {
    $updatePerfil = App\Models\User::find($request->id);
    $updatePerfil->name = $request->nombre;
    $updatePerfil->apellido = $request->apellido;
    $updatePerfil->usuario = $request->usuario;
    $updatePerfil->foto = $request->foto;
    $updatePerfil->dni = $request->dni;
    $updatePerfil->email = $request->email;
    $updatePerfil->tipo = $request->tipo;

    $updatePerfil->save();
    return back();
  }

}

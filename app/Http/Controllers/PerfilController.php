<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App;

class PerfilController extends Controller
{

  public function editarPerfil(Request $data)
  {

    $updatePerfil = App\Models\User::find($data->id);
    $updatePerfil->name = $data->nombre;
    $updatePerfil->apellido = $data->apellido;
    $updatePerfil->usuario = $data->usuario;
    $updatePerfil->dni = $data->dni;
    $updatePerfil->email = $data->email;

    $updatePerfil->save();
    return back();
  }

    public function eliminarFoto()
    {
      $usuario = App\Models\User::find(Auth::id());
      $usuario->foto = null;
      $usuario->save();
      return redirect('/perfil');
    }

    public function nuevaFoto(Request $request)
    {
      $file = $request->file('foto');

      $nombre = $file->getClientOriginalName();

      \Storage::disk('local')->put($nombre,  \File::get($file));

      $request->merge(['originalName'=> $nombre]);

      $this->editarFoto($request->all());

      return redirect('/perfil');
    }

    public function editarFoto(array $data)
    {

      $updatePerfil = App\Models\User::find(Auth::id());
      $updatePerfil->foto = $data['originalName'];

      $updatePerfil->save();
      return back();
    }

}

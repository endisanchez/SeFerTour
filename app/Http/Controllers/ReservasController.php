<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App;
use Illuminate\Support\Facades\Auth;

class ReservasController extends Controller
{

    public function crearReserva(Request $request)
    {
      $id_cliente = App\Models\User::find(Auth::id())->cliente()->get("id")[0]["id"];
      $nuevaReserva = new App\Models\Reserva;
      $nuevaReserva->id_tour = $request->id_tour;
      $nuevaReserva->id_cliente = $id_cliente;
      $nuevaReserva->save();

      return redirect('/reservar');
    }

}

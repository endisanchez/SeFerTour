<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App;
use Illuminate\Support\Facades\Auth;

class ReservasController extends Controller
{

    public function crearReserva(Request $request)
    {
      $cliente = Auth::user()->cliente;
      $tour = App\Models\Tour::find($request->id_tour);
      foreach ($cliente->tour as $reserva) {
        if(strval($reserva->pivot->tour_id) == $request->id_tour) {
          return redirect('/login');
        }
      }
      $cliente->tour()->attach($tour->id);
      return redirect('/reservar');
    }

    public function verReservas() {
      if(Auth::user()->cliente)
      {
        $reservas = Auth::user()->cliente->tour()->get();
      }
      else
      {
        return view('reservas');
      }
      return view('reservas')->with(compact('reservas'));
    }

    public function cancelarReserva($tour_id) {
      $cliente = Auth::user()->cliente;
      $cliente->tour()->detach($tour_id);
      return redirect('/reservar');
    }

}

<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App;

class TourController extends Controller
{

  public function toursProvincia($provincia) {
    $tours = App\Models\Tour::where('comunidad', '=', $provincia)->get();
    return view('tours')->with('tours', $tours);
  }

  public function filtroTours(Request $request) {
      if($request->fecha && $request->comunidad) {
      $tours = App\Models\Tour::where([
        ['comunidad', '=', str_replace(" ", "",$request->comunidad)],
        ['fecha', '=', $request->fecha],
        ])->get();
    }

    if($request->fecha && !$request->comunidad) {
      $tours = App\Models\Tour::where([
        ['fecha', '=', $request->fecha],
      ])->get();
    }

    if(!$request->fecha && $request->comunidad) {
      $tours = App\Models\Tour::where([
        ['comunidad', '=', str_replace(" ", "",$request->comunidad)],
      ])->get();
    }

    if(!$request->fecha && !$request->comunidad) {
      $tours = App\Models\Tour::all();
    }

    return view("tours")->with("tours", $tours);
  }

  public function nuevoTour(Request $request) {
    $parseoComunidad = str_replace(" ", "", $this->quitar_tildes($request->comunidad));
    $parseoProvincia = str_replace(" ", "", $this->quitar_tildes($request->provincia));
    $parseoMunicipio = str_replace(" ", "", $this->quitar_tildes($request->municipio));
    $nuevoTour = new App\Models\Tour;
    $nuevoTour->nombre = $request->name;
    $nuevoTour->comunidad = $parseoComunidad;
    $nuevoTour->provincia = $parseoProvincia;
    $nuevoTour->ciudad = $parseoMunicipio;
    $nuevoTour->fecha = $request->fecha;
    $nuevoTour->hora = $request->hora;
    $nuevoTour->latitud = $request->latitud;
    $nuevoTour->longitud = $request->longitud;
    $nuevoTour->idioma_tour = $request->idioma;
    $nuevoTour->id_guia = Auth::user()->guia->id;
    $nuevoTour->save();

    return back();
  }

  function quitar_tildes($cadena) {
    $no_permitidas= array ("á","é","í","ó","ú","Á","É","Í","Ó","Ú","ñ","À","Ã","Ì","Ò","Ù","Ã™","Ã ","Ã¨","Ã¬","Ã²","Ã¹","ç","Ç","Ã¢","ê","Ã®","Ã´","Ã»","Ã‚","ÃŠ","ÃŽ","Ã”","Ã›","ü","Ã¶","Ã–","Ã¯","Ã¤","«","Ò","Ã","Ã„","Ã‹");
    $permitidas= array ("a","e","i","o","u","A","E","I","O","U","n","N","A","E","I","O","U","a","e","i","o","u","c","C","a","e","i","o","u","A","E","I","O","U","u","o","O","i","a","e","U","I","A","E");
    $texto = str_replace($no_permitidas, $permitidas ,$cadena);
    return $texto;
  }

  public function toursGuia() {
    $guia = Auth::user()->guia->id;
    $tours = App\Models\Tour::where('id_guia', '=', $guia)->get();
    return view('misTours')->with('tours', $tours);
  }

  public function eliminarTourguia($id) {
    $tour = App\Models\Tour::findOrFail($id);
    $tour->delete();
    return back();
  }

}

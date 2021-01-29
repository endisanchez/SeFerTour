<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
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

}

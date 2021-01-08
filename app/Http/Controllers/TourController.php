<?php

namespace App\Http\Controllers;
use App;

class TourController extends Controller
{

  public function toursProvincia($provincia) {
    $tours = App\Models\Tour::where('provincia', '=', $provincia)->get();
    // dd($tours);
    return view("tours")->with("tours", $tours);
  }

}

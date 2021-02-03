<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class comunidadesController extends Controller
{

  public function comunidadesJSON(){
      $comunidades = App\Models\Comunidade::all();
      return response()->json($comunidades, 201);
  }

}

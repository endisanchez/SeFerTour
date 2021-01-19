<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;

    public function cliente()
	  {
    	return $this->belongsToMany('App\Models\Cliente');
	  }

    public function guia()
    {
      return $this->belongsTo('App\Models\Guia', 'id_guia');
    }

}

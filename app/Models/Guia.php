<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guia extends Model
{
    use HasFactory;

    public function user()
    {
      return $this->belongsTo('App\Models\User', 'id_usuario');
    }

    public function tour()
	  {
    	return $this->hasMany('App\Models\Tour');
	  }

}

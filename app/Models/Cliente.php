<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    public function user()
    {
      return $this->belongsTo('App\Models\User');
    }

    public function tour()
	  {
    	return $this->belongsToMany('App\Models\Tour');
	  }

}

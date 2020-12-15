<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    public function guia()
    {
      return $this->hasOne('App\Models\Guia');
    }

    public function admin()
    {
      return $this->hasOne('App\Models\Admin');
    }

    public function cliente()
    {
      return $this->hasOne('App\Models\Cliente');
    }
}

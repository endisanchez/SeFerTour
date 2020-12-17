<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Usuario as Authenticatable;

class Usuario extends Authenticatable
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
        'apellido',
        'dni',
        'email',
        'usuario',
        'contraseña',
        'tipo'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

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

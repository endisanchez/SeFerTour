<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      $origins = ['Andalucia', 'Aragon', 'Asturias', 'Islas Baleares', 'Canarias', 'Cantabria', 'Castilla Y Leon', 'Castilla La Mancha', 'Cataluna', 'Extremadura', 'Galicia', 'Comunidad de Madrid', 'Murcia', 'Navarra', 'Pais Vasco', 'La Rioja'];

      for ($i = 0; $i < count($origins); $i++) {
          DB::table('comunidades')->insert([
              'nombre' => $origins[$i],
          ]);
      }

      $origins2 = array(
        0 => array(
          'name' => 'Guia',
          'apellido' => 'Guia',
          'dni' => '12345678A',
          'email' => 'guia@guia.com',
          'foto' => NULL,
          'usuario' => 'Guia',
          'password' => Hash::make('111111111'),
          'tipo' => 'Guia',
          'email_verified_at' => date("Y-m-d h:i:s"),
          'remember_token' => NULL,
          'created_at' => NULL,
          'updated_at' => NULL,
          'deleted_at' => NULL,
        ),
        1 => array(
          'name' => 'Cliente',
          'apellido' => 'Cliente',
          'dni' => '12345678B',
          'email' => 'cliente@cliente.com',
          'foto' => NULL,
          'usuario' => 'Cliente',
          'password' => Hash::make('111111111'),
          'tipo' => 'Cliente',
          'email_verified_at' => date("Y-m-d h:i:s"),
          'remember_token' => NULL,
          'created_at' => NULL,
          'updated_at' => NULL,
          'deleted_at' => NULL,
        ),
        2 => array(
          'name' => 'Admin',
          'apellido' => 'Admin',
          'dni' => '12345678Z',
          'email' => 'admin@admin.com',
          'foto' => NULL,
          'usuario' => 'Admin',
          'password' => Hash::make('111111111'),
          'tipo' => 'Admin',
          'email_verified_at' => date("Y-m-d h:i:s"),
          'remember_token' => NULL,
          'created_at' => NULL,
          'updated_at' => NULL,
          'deleted_at' => NULL,
        ),
      );

      for ($i = 0; $i < count($origins2); $i++) {
          DB::table('users')->insert([
            'name' => $origins2[$i]['name'],
            'apellido' => $origins2[$i]['apellido'],
            'dni' => $origins2[$i]['dni'],
            'email' => $origins2[$i]['email'],
            'foto' => $origins2[$i]['foto'],
            'usuario' => $origins2[$i]['usuario'],
            'password' => $origins2[$i]['password'],
            'tipo' => $origins2[$i]['tipo'],
            'email_verified_at' => $origins2[$i]['email_verified_at'],
            'remember_token' => $origins2[$i]['remember_token'],
            'created_at' => $origins2[$i]['created_at'],
            'updated_at' => $origins2[$i]['updated_at'],
            'deleted_at' => $origins2[$i]['deleted_at'],
          ]);
      }

      DB::table('guias')->insert([
        'id' => '1',
        'idioma' => null,
        'id_usuario' => '1',
      ]);

      $origins4 = array(
        0 => array(
          'nombre' => 'Tour por San Sebastián',
          'fecha' => '2021-02-27',
          'hora' => '18:00',
          'comunidad' => 'PaisVasco',
          'provincia' => 'Guipuzkoa',
          'ciudad' => 'San Sebastian',
          'direccion' => 'Kale Nagusia, 2',
          'idioma_tour' => 'Español',
          'latitud' => '40.407287489365885',
          'longitud' => '-3.6969656548839285',
          'id_guia' => '1',
          'created_at' => NULL,
          'updated_at' => NULL,
        ),
        1 => array(
          'nombre' => 'Tour por Albacete',
          'fecha' => '2021-02-25',
          'hora' => '13:00',
          'comunidad' => 'CastillaLaMancha',
          'provincia' => 'Albacete',
          'ciudad' => 'Albacete',
          'direccion' => 'Bar Albacete',
          'idioma_tour' => 'Español',
          'latitud' => '40.407287489365885',
          'longitud' => '-3.6969656548839285',
          'id_guia' => '1',
          'created_at' => NULL,
          'updated_at' => NULL,
        ),
        2 => array(
          'nombre' => 'Tour por Madrid',
          'fecha' => '2021-02-25',
          'hora' => '13:00',
          'comunidad' => 'ComunidaddeMadrid',
          'provincia' => 'Madrid',
          'ciudad' => 'Madrid',
          'direccion' => 'Plaza del sol',
          'idioma_tour' => 'Español',
          'latitud' => '40.407287489365885',
          'longitud' => '-3.6969656548839285',
          'id_guia' => '1',
          'created_at' => NULL,
          'updated_at' => NULL,
        ),
      );

      for ($i = 0; $i < count($origins4); $i++) {
          DB::table('tours')->insert([
            'nombre' => $origins4[$i]['nombre'],
            'fecha' => $origins4[$i]['fecha'],
            'hora' => $origins4[$i]['hora'],
            'comunidad' => $origins4[$i]['comunidad'],
            'provincia' => $origins4[$i]['provincia'],
            'ciudad' => $origins4[$i]['ciudad'],
            'direccion' => $origins4[$i]['direccion'],
            'idioma_tour' => $origins4[$i]['idioma_tour'],
            'latitud' => $origins4[$i]['latitud'],
            'longitud' => $origins4[$i]['longitud'],
            'id_guia' => $origins4[$i]['id_guia'],
            'created_at' => $origins4[$i]['created_at'],
            'updated_at' => $origins4[$i]['updated_at'],
          ]);
      }

    }
}

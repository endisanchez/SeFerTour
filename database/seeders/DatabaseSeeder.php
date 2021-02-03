<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
    }
}

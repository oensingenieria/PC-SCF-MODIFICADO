<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class EncargadosSeeder extends Seeder  {

  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    
    \DB::table('encargados')->insert(array(

          'nombre' => 'María José Delgado' 

        ));

    \DB::table('encargados')->insert(array(

          'nombre' => 'Isaac Dávila' 

        ));

    \DB::table('encargados')->insert(array(

          'nombre' => 'Jason Fernández' 

        ));

    \DB::table('encargados')->insert(array(

          'nombre' => 'Jason Abarca' 

        ));

     \DB::table('encargados')->insert(array(

          'nombre' => 'Guillermo Ordeñana' 

        ));

     \DB::table('encargados')->insert(array(

          'nombre' => 'Marvin Murillo' 

        ));
  

  }
}
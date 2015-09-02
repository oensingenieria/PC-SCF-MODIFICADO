<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class MoldeSeeder extends Seeder  {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		
    \DB::table('molde')->insert(array(

          'Nombre_Molde' => 'Molde #1' ,
          'Peso_Molde' => 3.60 ,
          'Volumen_Molde' => 0.007

      	));


   	\DB::table('molde')->insert(array(

          'Nombre_Molde' => 'Molde #2' ,
          'Peso_Molde' => 3.36 ,
          'Volumen_Molde' => 0.659

      	));

   	\DB::table('molde')->insert(array(

          'Nombre_Molde' => 'Molde #3' ,
          'Peso_Molde' => 2.14 ,
          'Volumen_Molde' => 2.265

      	));

   	\DB::table('molde')->insert(array(

          'Nombre_Molde' => 'Molde #4' ,
          'Peso_Molde' => 1.16 ,
          'Volumen_Molde' => 3.623

      	));

   	\DB::table('molde')->insert(array(

          'Nombre_Molde' => 'Molde #5' ,
          'Peso_Molde' => 0.25 ,
          'Volumen_Molde' => 3.187

      	));

   	\DB::table('molde')->insert(array(

          'Nombre_Molde' => 'Molde #6' ,
          'Peso_Molde' => 1.25 ,
          'Volumen_Molde' => 0.654

      	));

   
	}
}
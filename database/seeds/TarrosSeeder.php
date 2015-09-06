<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class TarrosSeeder extends Seeder  {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		
    \DB::table('tarros')->insert(array(

          'codigo' => '421RT1' 

      	));

    \DB::table('tarros')->insert(array(

          'codigo' => '421RT2' 

        ));

    \DB::table('tarros')->insert(array(

          'codigo' => '471RT1' 

        ));

    \DB::table('tarros')->insert(array(

          'codigo' => '471RT2' 

        ));

   
   
	}
}
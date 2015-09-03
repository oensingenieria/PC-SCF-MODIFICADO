<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UserSeeder extends Seeder  {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{

    \DB::table('users')->insert(array(

          'username' => 'PPP-DMA82' ,
          'email' => 'none@none' ,
          'password' => \Hash::make('82010')
         
        ));

    \DB::table('users')->insert(array(

          'username' => 'PPP-MMU71' ,
          'email' => 'marvin.murillo@pc.cr' ,
          'password' => \Hash::make('17221')
         
        ));

		
    \DB::table('users')->insert(array(

          'username' => 'PPP-MDE98' ,
          'email' => 'none2@none' ,
          'password' => \Hash::make('15398')
         
      	));


     \DB::table('users')->insert(array(

          'username' => 'PPP-IDA12' ,
          'email' => 'none3@none' ,
          'password' => \Hash::make('53214')
         
      	));

     \DB::table('users')->insert(array(

          'username' => 'PPP-JFE13' ,
          'email' => 'none4@none' ,
          'password' => \Hash::make('33415')
         
      	));


\DB::table('users')->insert(array(

          'username' => 'PPP-JAB87' ,
          'email' => 'none5@none' ,
          'password' => \Hash::make('57538')
         
      	));


\DB::table('users')->insert(array(

          'username' => 'PPP-GOR77' ,
          'email' => 'none6@none' ,
          'password' => \Hash::make('35774')
         
      	));

\DB::table('users')->insert(array(

          'username' => 'PPP-ERO' ,
          'email' => 'none7@none' ,
          'password' => \Hash::make('85070')
         
        ));

\DB::table('users')->insert(array(

          'username' => 'PPP-CRO' ,
          'email' => 'none8@none' ,
          'password' => \Hash::make('60540')
         
        ));



	}
}
<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVebeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('vebe', function(Blueprint $table)
		{
			$table->increments('id');

			$table->date('Fecha');
			$table->string('Pista');
			$table->string('Vebe_Carga');
			$table->string('Tarro1');
			$table->string('Tarro2');
			$table->string('Tarro3');
			$table->string('Mezcla1');
			$table->string('Mezcla2');
			$table->string('Mezcla3');
			$table->string('Peralte1');
			$table->string('Peralte2');
			$table->string('Peralte3');
			$table->decimal('Volumen1');
			$table->decimal('Volumen2');
			$table->decimal('Volumen3');
			$table->decimal('Humedad1');
			$table->decimal('Humedad2');
			$table->decimal('Humedad3');
			$table->decimal('Amperimetro1');
			$table->decimal('Amperimetro2');
			$table->decimal('Amperimetro3');
			$table->decimal('Vebe1');
			$table->decimal('Vebe2');
			$table->decimal('Vebe3');



			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('vebes');
	}

}

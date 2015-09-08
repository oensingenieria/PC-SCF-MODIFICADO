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

			$table->date('Fecha_Registro');
			$table->date('Fecha_Ensayo');
			$table->string('Pista');
			$table->string('Numero_Carga');
			$table->string('Tarro');
		    $table->string('Mezcla');
			$table->string('Peralte');
		    $table->decimal('Volumen');
			$table->decimal('Humedad');
		    $table->decimal('Amperimetro');
	        $table->decimal('Vebe');
		
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
		Schema::drop('vebe');
	}

}

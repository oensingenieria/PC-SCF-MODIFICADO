<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFalla7Table extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('falla7', function(Blueprint $table)
		{
			$table->increments('id');

			$table->string('Numero_Carga');
			$table->date('Fecha_Moldeo');
			$table->date('Fecha_Falla');
			$table->integer('Numero_Dias');
			$table->string('Lugar_Falla');
			$table->decimal('Falla1');
			$table->decimal('Falla2');
			$table->decimal('Falla3');
			$table->string('Codigo_Diseño');
			$table->string('Nombre_Proyecto');
			$table->string('Nombre_Elemento');
			$table->decimal('Resis_Nominal');
			$table->decimal('Resis_Promedio');
			$table->decimal('Resis_Porcentual');




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
		Schema::drop('falla7');
	}

}

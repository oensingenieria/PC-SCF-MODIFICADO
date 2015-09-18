<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateYieldTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('yield', function(Blueprint $table)
		{
			$table->increments('id');
			$table->date('Fecha_Ensayo');
			$table->date('Fecha_Registro');
			$table->date('Fecha_Carga');
			$table->string('Codigo');
			$table->time('Hora_Ensayo');
			
			$table->string('Molde');
			$table->decimal('Peso_Molde');
			$table->decimal('Volumen_Molde');
			$table->integer('Agregado');
			$table->integer('Cemento');
			$table->decimal('Aditivo1');
			$table->integer('Agua');
			$table->decimal('Aditivo2');
			$table->decimal('Yield');
			$table->decimal('Volumen_Teorico');
			$table->string('Encargado');
            $table->string('Nombre_Cuenta');
			$table->string('Numero_Carga');
			$table->decimal('Densidad_Real');
			$table->decimal('Volumen_Real');
			$table->decimal('Rendimiento_Real');

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
		Schema::drop('yield');
	}

}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrasferenciaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('transferencia', function(Blueprint $table)
		{
			$table->increments('id');
			$table->date('Fecha_Ensayo');
			$table->date('Fecha_Registro');
			$table->date('Fecha_Carga');
            $table->decimal('Falla1');
            $table->time('Hora_f1');
			$table->integer('Edad_f1');
			$table->decimal('Falla2');
			$table->time('Hora_f2');
			$table->integer('Edad_f2');
			$table->decimal('Falla3');
			$table->time('Hora_f3');
			$table->integer('Edad_f3');
			$table->decimal('Promedio_Carga'); //Calculo con las tres fallas
			$table->string('Numero_Carga');
			$table->string('Encargado');
            $table->string('Nombre_Cuenta');
            $table->string('Codigo_Diseño');
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
		Schema::drop('transferencia');
	}

}

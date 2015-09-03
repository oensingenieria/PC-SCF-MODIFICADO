<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMixerconsumoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mixerconsumo', function(Blueprint $table)
		{
			$table->increments('id');


			$table->string('Numero_Carga');
			$table->string('Codigo_Material');
			$table->string('Tipo_Material');
			$table->integer('Orden_Secuencial');
			$table->decimal('Humedad_Agua');
			$table->integer('Humedad_Sensada');
			$table->decimal('Cantidad_Objetivo');
			$table->integer('Cantidad_Autom');
			$table->integer('Cantidad_Manual');
			$table->integer('Cantidad_Total');
			$table->integer('Inicio_Aditivo');
			$table->integer('Retardo_Inicio_Aditivo');
            $table->string('Codigo_Diseño');
			$table->string('Diseño');
			$table->string('Grafo');
			$table->string('Codigo_Elemento');
			$table->string('Codigo_Proyecto');
			$table->string('Nombre_Proyecto');
			$table->string('Nombre_Elemento');
			$table->date('Fecha_de_Carga');
			$table->time('Hora_de_Carga');
			$table->decimal('Volumen_de_Carga');
			$table->string('Boleta_Batida');
			$table->time('Hora_Inicio_Batida');
			$table->time('Hora_Descarga_Batida');
			$table->integer('Tiempo_Mezclado');
			$table->decimal('Humedad_Mezcla');


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
		Schema::drop('mixerconsumo');
	}

}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRevenimientoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('revenimiento', function(Blueprint $table)
		{
			$table->increments('id');
		    $table->string('Numero_Carga');
		    $table->string('Nombre_Proyecto');
		    $table->string('Nombre_Elemento');
		    $table->date('Fecha_Ensayo');
		    $table->time('Hora_Ensayo');
		    $table->decimal('Revenimiento');
		    $table->decimal('Temperatura');
		    $table->decimal('Volumen');
		    $table->enum('Zona',['Zona_1',
		    	                 'Zona_2',
		    	                 'Zona_3',
		    	                 'Zona_4',
		    	                 'Zona_5',
		    	                 'Zona_6',
		    	                 'Zona_7',
                                 'Zona_8']);

		    $table->string('Encargado');
		    $table->string('Codigo_Tarro');
		    $table->string('Observaciones');
		    $table->string('Nombre_Cuenta');
		    $table->enum('Revision',['Revisado',
		    	                   'Pendiente']);
		    $table->integer('id_mixer');


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
		Schema::drop('revenimiento');
	}

}

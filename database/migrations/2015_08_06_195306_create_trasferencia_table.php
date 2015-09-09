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
			$table->date('fecha');
			$table->time('hora');
			$table->decimal('falla');
			$table->string('id_cod_carga');
			$table->decimal('promedio');
			$table->string('estado');
			$table->string('Encargado');
            $table->string('Nombre_Cuenta');

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

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoldeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('molde', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('Nombre_Molde');
			$table->decimal('Peso_Molde');
			$table->decimal('Volumen_Molde', 3, 3);
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
		Schema::drop('molde');
	}

}

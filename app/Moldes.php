<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Moldes extends Model {

  protected $table = 'molde';

  protected $fillable = [
	 'Nombre_Molde', 
	 'Peso_Molde', 
	 'Volumen_Molde'
	  ];

}

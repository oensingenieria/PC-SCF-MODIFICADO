<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Falla28 extends Model {

    protected $table = 'falla28';


	protected $fillable = [
	 'Numero_Carga',
	 'Fecha_Moldeo', 
	 'Fecha_Falla',
	 'Numero_Dias',
	 'Lugar_Falla',
	 'Falla1',
	 'Falla2',
	 'Falla3',
	 'Codigo_Diseño',
	 'Nombre_Proyecto',
	 'Nombre_Elemento',
	 'Resis_Nominal',
	 'Resis_Promedio',
	 'Resis_Porcentual'
 
	   ];

}

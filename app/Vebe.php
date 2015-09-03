<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Vebe extends Model {

	protected $table = 'vebe';
	


	protected $fillable = ['Fecha', 'Pista','Vebe_Carga', 'Tarro1' , 'Tarro2' ,'Tarro3','Mezcla1','Mezcla2',
                         'Mezcla3','Peralte1','Peralte2','Peralte3' , 'Volumen1','Volumen2','Volumen3',
                          'Humedad1','Humedad2','Humedad3','Amperimetro1','Amperimetro2','Amperimetro3',
                          'Vebe1','Vebe2','Vebe3'];

}

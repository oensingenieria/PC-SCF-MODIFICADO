<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Vebe extends Model {

	protected $table = 'vebe';
	


	protected $fillable = ['Fecha_Registro','Fecha_Ensayo' , 'Fecha_Carga' ,'Pista','Numero_Carga', 'Tarro' ,'Mezcla','Peralte', 'Volumen',
                           'Nombre_Cuenta','Encargado','Humedad','Amperimetro',
                          'Vebe'];

}

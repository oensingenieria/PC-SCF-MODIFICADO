<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Ensayo extends Model {

	protected $table = 'yield';

	protected $fillable = ['Fecha_Ensayo','Fecha_Registro','Fecha_Carga','Codigo','Hora_Ensayo','Fecha_Ensayo','Molde','Peso_Molde','Volumen_Molde'
			,'Agregado','Cemento','Aditivo1','Agua','Aditivo2','Yield','Volumen_Teorico','Nombre_Cuenta' , 'Encargado' , 'Numero_Carga' ,
			'Densidad_Real' , 'Volumen_Real' , 'Rendimiento_Real'];

}

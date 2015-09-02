<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Mixer extends Model {


    protected $table = 'mixerconsumo';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
	 'Numero_Carga', 
	 'Codigo_Material', 
	 'Tipo_Material', 
	 'Orden_Secuencial', 
	 'Humedad_Agua', 
	 'Humedad_Sensada', 
	 'Cantidad_Objetivo', 
	 'Cantidad_Autom', 
	 'Cantidad_Manual', 
	 'Cantidad_Total', 
	 'Inicio_Aditivo', 
	 'Retardo_Inicio_Aditivo', 
	 'Codigo_Diseño', 
	 'Diseño', 
	 'Grafo',
	  'Codigo_Elemento',
	   'Codigo_Proyecto', 
	   'Nombre_Proyecto', 
	   'Nombre_Elemento', 
	   'Fecha_de_Carga', 
	   'Hora_de_Carga', 
	   'Volumen_de_Carga', 
	   'Boleta_Batida', 
	   'Hora_Inicio_Batida', 
	   'Hora_Descarga_Batida', 
	   'Tiempo_Mezclado', 
	   'Humedad_Mezcla'
	   ];




}

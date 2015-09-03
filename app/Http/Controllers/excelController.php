<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Mixer; // Modelo Mixer
use Auth;


/*
Esta clase es utilizada unicamente para cargar los datos del excel, en primera
instancia se verifica que exista una conexion abierta luego que esta sea del 
administrador si no es asi se redirije el flujo .

*/



class excelController extends Controller {


//Obtiene la data desde el excel del mixer
//Las librerias ya se encuentran activadas para este proyecto
//Se carga el excel accediendo a la ruta misitio.com/pc/getdata/excel/loadmixer	

	public function get_data(){

	   
        
		//El primer parametro de este facade permite establecer la ruta de donde se encuentra el excel
		\Excel::load('C:/Mixhoy/Consumos (Hoy).xlsx', function($reader) {

		

		    // Getting all results
		    $results = $reader->get();

		  dd($results);
		 
		   //Con un loop recorre el resultado del excel como variable $r
		   //Mientras se recorre se llama un objeto de mixer quien es el encargado de abrir la base de datos
		   //Los datos del excel son almacenados en los campos de la base de datos 
		   foreach ($results as $r ) {
		   
		   	 $get = new Mixer;
		   	 $get->Numero_Carga = $r->numero_carga;
		   	 $get->Codigo_Material = $r->codigo_material;
		   	 $get->Tipo_Material = $r->tipo_material;
		   	 $get->Orden_Secuencial = $r->orden_secuencial;
		   	 $get->Humedad_Agua = $r->humedadagua;
		   	 $get->Humedad_Sensada = $r->humedad_sensada;
		   	 $get->Cantidad_Objetivo = $r->cantidad_objetivo;
		   	 $get->Cantidad_Autom = $r->cantidad_autom;
		   	 $get->Cantidad_Manual = $r->cantidad_manual;
		   	 $get->Cantidad_Total = $r->cantidad_total;
		   	 $get->Inicio_Aditivo = $r->inicio_aditivo;
		   	 $get->Retardo_Inicio_Aditivo = $r->retardo_inicio_aditivo;
		   	 $get->Codigo_Diseño = $r->codigo_diseno;
		   	 $get->Diseño = $r->diseno;
		   	 $get->Grafo = $r->grafo;
		   	 $get->Codigo_Elemento = $r->codigo_elemento;
		   	 $get->Codigo_Proyecto = $r->codigo_proyecto;
		   	 $get->Nombre_Proyecto = $r->nombre_proyecto;
		   	 $get->Nombre_Elemento = $r->nombre_elemento;
		   	 $get->Fecha_de_Carga = $r->fecha_de_carga;
		   	 $get->Hora_de_Carga = $r->hora_de_carga;
		   	 $get->Volumen_de_Carga = $r->volumen_de_carga;
		   	 $get->Boleta_Batida = $r->boleta_batida;
		   	 $get->Hora_Inicio_Batida = $r->hora_inicio_batida;
		   	 $get->Hora_Descarga_Batida = $r->hora_descarga_batida;
		   	 $get->Tiempo_Mezclado = $r->tiempo_mezclado;
		   	 $get->Humedad_Mezcla = $r->humedad_mezcla;

		   	 //Salvo el registro
		   	$get->save();

		   }

		  

		
		});

	 //Finalizado el bucle redirijo a la pantalla principal con datos de seccion satisfactorios
		   return redirect('/')->with('success','Mixer cargado!');
		

	}




}
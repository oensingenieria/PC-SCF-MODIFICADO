<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Http\Requests\Request_Trabajabilidad; //Solicitud trabajabilidad


use App\Mixer;
use App\Trabajabilidad;
use App\Encargado;
use App\Tarros;

use Auth;

class EnsayoTrabajabilidadController extends Controller {


	public function __construct()
	    {
		$this->middleware('auth');
		set_time_limit(600); //60 seconds = 1 minute
		
	     }

//Trabajabilidad y flujo 

public function trabajabilidad_flujo(){

		        return view('trabajabilidad_flujo' , array('titlemesage' => 'TRABAJABILIDAD Y FLUJO') );

			}

//Consultas de ensayos


			public function consulta_trabajabilidad_carga(){

								
				 //Filtrando registros desde trabajabilidad
				  $carga = Mixer::where('mixerconsumo.Numero_Carga', $_POST['Parametro'])
				  						->whereNotExists(function($query)
								            {
								                $query->select(\DB::raw(1))
								                      ->from('revenimiento')
								                      ->whereRaw('revenimiento.Numero_Carga = mixerconsumo.Numero_Carga');
								            })
				  						->groupBy('mixerconsumo.Numero_Carga')
				  						->get();

			   //Carga encargados disponibles     
			   $encargados = Encargado::all();

			   //Carga los Tarros
			   $tarros = Tarros::all();

				return view('trabajabilidad_flujo' , 
					array('mixer' => $carga , 
						  'tarros' => $tarros ,
						  'encargados' => $encargados ,
						  'titlemesage' => 'CONSULTA POR NUMERO DE CARGA '.$_POST['Parametro']. '. ENSAYOS NO REALIZADOS.'
						));


			}

			public function consulta_trabajabilidad_codigo(){

				//Filtrando registros desde trabajabilidad
				  $carga = Mixer::where('mixerconsumo.Codigo_Diseño', $_POST['Parametro'])
				  						->whereNotExists(function($query)
								            {
								                $query->select(\DB::raw(1))
								                      ->from('revenimiento')
								                      ->whereRaw('revenimiento.Numero_Carga = mixerconsumo.Numero_Carga');
								            })
				  						->groupBy('mixerconsumo.Numero_Carga')
				  						->get();

			   //Carga encargados disponibles     
			   $encargados = Encargado::all();

			   //Carga los Tarros
			   $tarros = Tarros::all();

				return view('trabajabilidad_flujo' , 
					array('mixer' => $carga , 
						  'tarros' => $tarros ,
						  'encargados' => $encargados ,
						  'titlemesage' => 'CONSULTA POR NUMERO DE CARGA '.$_POST['Parametro']. '. ENSAYOS NO REALIZADOS.'
						));

			}	

		

			public function consulta_trabajabilidad_fecha(){

				//Filtrando registros desde trabajabilidad
				  $carga = Mixer::where('mixerconsumo.Fecha_de_Carga', $_POST['Parametro'])
				  						->whereNotExists(function($query)
								            {
								                $query->select(\DB::raw(1))
								                      ->from('revenimiento')
								                      ->whereRaw('revenimiento.Numero_Carga = mixerconsumo.Numero_Carga');
								            })
				  						->groupBy('mixerconsumo.Numero_Carga')
				  						->get();

			   //Carga encargados disponibles     
			   $encargados = Encargado::all();

			   //Carga los Tarros
			   $tarros = Tarros::all();

				return view('trabajabilidad_flujo' , 
					array('mixer' => $carga , 
						  'tarros' => $tarros ,
						  'encargados' => $encargados ,
						  'titlemesage' => 'CONSULTA POR NUMERO DE CARGA '.$_POST['Parametro']. '. ENSAYOS NO REALIZADOS.'
						));
				

			}

//Post 
			public function post_trabajabilidad_flujo(Request_Trabajabilidad $request){
				
		       $datos = new Trabajabilidad($request->all());
		       
		       
		        $datos->id_mixer =  $_POST['idmixer'] ;
				$datos->Revision = 'Revisado';
				$datos->Nombre_Cuenta = Auth::user()->username;
				$datos->save();

				return redirect('pc/trabajabilidad_flujo/save/'.$datos->Fecha_Ensayo)->with('success','Ensayo ingresado');

			}

//Redirect
			public function redirect_trabajabilidad_flujo($fecha){

				//Filtrando registros desde trabajabilidad
				  $carga = Mixer::where('mixerconsumo.Fecha_de_Carga', $fecha)
				  						->whereNotExists(function($query)
								            {
								                $query->select(\DB::raw(1))
								                      ->from('revenimiento')
								                      ->whereRaw('revenimiento.Numero_Carga = mixerconsumo.Numero_Carga');
								            })
				  						->groupBy('mixerconsumo.Numero_Carga')
				  						->get();

			   //Carga encargados disponibles     
			   $encargados = Encargado::all();

			   //Carga los Tarros
			   $tarros = Tarros::all();

				return view('trabajabilidad_flujo' , 
					array('mixer' => $carga , 
						  'tarros' => $tarros ,
						  'encargados' => $encargados ,
						  'titlemesage' => 'CONSULTA POR FECHA '.$fecha. '. ENSAYOS NO REALIZADOS.'
						));


			}

// Consultas de ensayo por historial



			public function consulta_trabajabilidad_carga_historial(){
				
			$mixer = Trabajabilidad::where('revenimiento.Numero_Carga', '=', $_POST['Parametro'] )
										        ->groupBy('revenimiento.Numero_Carga')
										        ->get();


				return view('trabajabilidad_flujo_historial' , array(
					'mixer' => $mixer ,
					'titlemesage' => 'CONSULTA POR NUMERO DE CARGA '.$_POST['Parametro']. '. ENSAYOS REALIZADOS.'


					) );

			}

			
			public function consulta_trabajabilidad_fecha_historial(){

				$mixer = Trabajabilidad::where('revenimiento.Fecha_Ensayo', '=', $_POST['Parametro'] )
										        ->groupBy('revenimiento.Numero_Carga')
										        ->get();


				return view('trabajabilidad_flujo_historial' , array(
					'mixer' => $mixer ,
					'titlemesage' => 'CONSULTA POR FECHA '.$_POST['Parametro']. '. ENSAYOS REALIZADOS.'


					) );
				
			}


			public function consulta_trabajabilidad_fecha_historial_rango(){


				$mixer = Trabajabilidad::where('revenimiento.Fecha_Ensayo', '>=', $_POST['Desde'] )
			                                    ->where('revenimiento.Fecha_Ensayo', '<=', $_POST['Hasta'] )
										        ->groupBy('revenimiento.Numero_Carga')
										        ->get();



				return view('trabajabilidad_flujo_historial' , array(
					'mixer' => $mixer ,
					'titlemesage' => 'CONSULTA POR FECHA DESDE '.$_POST['Desde']. ' HASTA '.$_POST['Hasta'].'. ENSAYOS REALIZADOS.'


					) );
				
			}

//Fin flujo trabajabilidad

}

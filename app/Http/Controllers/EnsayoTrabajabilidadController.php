<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Http\Requests\Request_Trabajabilidad; //Solicitud trabajabilidad


use App\Mixer;
use App\Trabajabilidad;

use Auth;

class EnsayoTrabajabilidadController extends Controller {


	public function __construct()
	    {
		$this->middleware('auth');
		set_time_limit(600); //60 seconds = 1 minute
		
	     }


//Manejo del flujo de trabajabilidad

			public function trabajabilidad_flujo(){

		        return view('trabajabilidad_flujo' , array('titlemesage' => 'TRABAJABILIDAD Y FLUJO') );

			}

			public function post_trabajabilidad_flujo(Request_Trabajabilidad $request){
				
		       $datos = new Trabajabilidad($request->all());
				
				
		        $datos->id_mixer =  $_POST['idmixer'] ;
				$datos->Revision = 'Revisado';
				$datos->Nombre_Cuenta = Auth::user()->username;
				$datos->save();

				return redirect('/pc/trabajabilidad_flujo')->with('success','Revisión realizada con exito');

			}



			public function consulta_trabajabilidad_carga(){

				$codigo = $_POST['Parametro'];

				$mixer = Mixer::where("Numero_Carga",$codigo)->groupBy('Numero_Carga')->get();

				return view('trabajabilidad_flujo' , 
					array('mixer' => $mixer , 
						 'titlemesage' => 'CONSULTA POR NUMERO DE CARGA '.$codigo . '. ENSAYOS NO REALIZADOS.'

						));


			}

			public function consulta_trabajabilidad_codigo(){

				$codigo = $_POST['Parametro'];
				
				$mixer = Mixer::where('Codigo_Diseño' , $codigo )->groupBy('Numero_Carga')->get();
				
				return view('trabajabilidad_flujo' , 
					array('mixer' => $mixer , 
						  'titlemesage' => 'CONSULTA POR CODIGO DE DISEÑO '.$codigo . '. ENSAYOS NO REALIZADOS.'

						));

			}	

		

			public function consulta_trabajabilidad_fecha(){

				$codigo = $_POST['Parametro'];
				
				$mixer = Mixer::where('Fecha_de_Carga' , $codigo )->groupBy('Numero_Carga')->get();
				
				return view('trabajabilidad_flujo' , 
					array(
						'mixer' => $mixer ,
						'titlemesage' => 'CONSULTA POR FECHA '.$codigo . '. ENSAYOS NO REALIZADOS.'

						));
				

			}



// Consultas por historial



			public function consulta_trabajabilidad_carga_historial(){
				
			$mixer = \DB::table('mixerconsumo')
			        ->join('revenimiento', function ($join) {
			        	
			        	

			            $join->on('mixerconsumo.Numero_Carga', '=', 'revenimiento.Numero_Carga')
			                 ->where('revenimiento.Numero_Carga', '=', $_POST['Parametro'] );
			        })
			        ->groupBy('revenimiento.Numero_Carga')
			        ->get();


				return view('trabajabilidad_flujo_historial' , array(
					'mixer' => $mixer ,
					'titlemesage' => 'CONSULTA POR NUMERO DE CARGA '.$_POST['Parametro']. '. ENSAYOS REALIZADOS.'


					) );

			}

			
			public function consulta_trabajabilidad_fecha_historial(){

				$mixer = \DB::table('mixerconsumo')
			        ->join('revenimiento', function ($join) {
			        	
			        	

			            $join->on('mixerconsumo.Numero_Carga', '=', 'revenimiento.Numero_Carga')
			                 ->where('revenimiento.Fecha_Ensayo', '=', $_POST['Parametro'] );
			        })
			        ->groupBy('revenimiento.Numero_Carga')
			        ->get();


				return view('trabajabilidad_flujo_historial' , array(
					'mixer' => $mixer ,
					'titlemesage' => 'CONSULTA POR FECHA '.$_POST['Parametro']. '. ENSAYOS REALIZADOS.'


					) );
				
			}


			public function consulta_trabajabilidad_fecha_historial_rango(){

				$mixer = \DB::table('mixerconsumo')
			        ->join('revenimiento', function ($join) {
			        	
			        	

			            $join->on('mixerconsumo.Numero_Carga', '=', 'revenimiento.Numero_Carga')
			                 ->where('revenimiento.Fecha_Ensayo', '>=', $_POST['Desde'] )
			                 ->where('revenimiento.Fecha_Ensayo', '<=', $_POST['Hasta'] );


			        })
			        ->groupBy('revenimiento.Numero_Carga')
			        ->get();


				return view('trabajabilidad_flujo_historial' , array(
					'mixer' => $mixer ,
					'titlemesage' => 'CONSULTA POR FECHA DESDE '.$_POST['Desde']. ' HASTA '.$_POST['Hasta'].'. ENSAYOS REALIZADOS.'


					) );
				
			}


//Fin flujo trabajabilidad





}

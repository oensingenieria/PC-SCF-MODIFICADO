<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;


use App\Mixer; // Modelo Mixer
use App\Falla28;


use App\Http\Requests\Request_Falla28;//Solicitud falla 28

class EnsayoFalla28Controller extends Controller {

public function __construct()
	{
		$this->middleware('auth');
		set_time_limit(600); //60 seconds = 1 minute
		
	}




//Flujo falla 28

			public function falla28(){

				return view('falla28');
			}   




		   // Busqueda por fecha omitiendo los ensayos de falla 28 realizados
			public function falla28_busqueda_fecha(){
		       
			    
			    // Fecha que ingreso el usuario en formato DIA/MES/AÑO
			    $fecha28 = date('Y-m-d',strtotime('-28 days', strtotime($_POST['fecha'])));
			 	$fecha33 = date('Y-m-d',strtotime('-33 days', strtotime($_POST['fecha'])));
		       
			    //Abre el mixer
				$datos_mixer = Mixer::where('Fecha_de_Carga','<=' ,$fecha28)
							   ->where('Fecha_de_Carga','>=' ,$fecha33)
							   ->groupBy('Numero_Carga')	
				              ->get();
				
				//Abre fallas con otro nombre . para comparar unicamente 
				$datos_falla = Falla28::where('Fecha_Moldeo','<=',$fecha28)
		                        ->where('Fecha_Moldeo','>=' ,$fecha33)
		                        ->groupBy('Numero_Carga')	
				                ->get();
		            
		       	
				return view('falla28' , array(
					'mixer' => $datos_mixer ,
					'fecha_busqueda' => $_POST['fecha'] ,
					'comparaensayo' => $datos_falla 
					//'res_nominal' => $res_nominal

					 ));

		          
			    }

		    //Busqueda por fecha desplegando ensayos
			 public function falla28_ensayo_busqueda_fecha(){
			 	 
			    
			 	$fecha28 = $_POST['fecha'];

			 	
			 	//Abre el mixer


	             $datos_mixer =    \DB::table('mixerconsumo')
						        ->join('falla28', function ($join) {

						        	// Fecha que ingreso el usuario en formato DIA/MES/AÑO
								   $fecha28 = $_POST['fecha'];


						        	//Consulta uniendo los registros
						            $join->on('mixerconsumo.Numero_Carga', '=', 'falla28.Numero_Carga')
						            ->where('falla28.Fecha_Falla','=' ,$fecha28);	

						        })
						        ->groupBy('falla28.Numero_Carga')
						        ->get();



			 	
			    //Abre las fallas
				$datos_falla = Falla28::where('Fecha_Falla','=',$fecha28)
				                 ->groupBy('Numero_Carga')
		                        ->get();
		                        
				

				

				return view('falla28' , array(
					'ensayo' => $datos_falla ,
					'mixer' => $datos_mixer ,
					'fecha_busqueda' => $_POST['fecha']

					 ));

			 }   
				   

		   // Envio del formulario
			public function post_falla28(Request_Falla28 $request){

			
				$falla28 = new Falla28($request->all());
				
				$falla28->Numero_Carga = $_POST['Numero_Carga'];

				$falla28->save();


			    //Abre las fallas
				$datos_ensayo = Falla28::all();

				//Abre el mixer
				$datos_mixer = Mixer::where('Numero_Carga','<=' ,$_POST['Numero_Carga'])	
				              ->get();


				

				return view('falla28' , array(
					'ensayo' => $datos_ensayo ,
					'mixer' => $datos_mixer ,
		            'fecha_busqueda' => $_POST['Fecha_Moldeo']
					
					 ));

			}


//Fin flujo falla 28



}

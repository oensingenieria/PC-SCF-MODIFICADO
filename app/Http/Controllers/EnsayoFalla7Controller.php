<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Mixer;
use App\Falla7;


use App\Http\Requests\Request_Falla7;//Solicitud falla 7


class EnsayoFalla7Controller extends Controller {

			public function __construct()
	    {
		$this->middleware('auth');
		set_time_limit(600); //60 seconds = 1 minute
		
	     }


			//Primera vista de las fallas
			public function falla7(){

				return view('falla7');
			}   




		   // Busqueda por fecha omitiendo los ensayos	
			public function falla7_busqueda_fecha(){
		       
			    
			    // Fecha que ingreso el usuario en formato DIA/MES/AÑO
			    $fecha7 = date('Y-m-d',strtotime('-7 days', strtotime($_POST['fecha'])));
			 	$fecha12 = date('Y-m-d',strtotime('-12 days', strtotime($_POST['fecha'])));
		       
			    //Abre el mixer
				$datos_mixer = Mixer::where('Fecha_de_Carga','<=' ,$fecha7)
							   ->where('Fecha_de_Carga','>=' ,$fecha12)	
							   ->groupBy('Numero_Carga')
				              ->get();
				
				//Abre fallas con otro nombre . para comparar unicamente 
				$datos_falla = Falla7::where('Fecha_Moldeo','<=',$fecha7)
				                ->groupBy('Numero_Carga')
		                        ->where('Fecha_Moldeo','>=' ,$fecha12)	
				                ->get();
		            
		       	
				return view('falla7' , array(
					'mixer' => $datos_mixer ,
					'fecha_busqueda' => $_POST['fecha'] ,
					'comparaensayo' => $datos_falla 
					//'res_nominal' => $res_nominal

					 ));

		          
			    }

		    //Busqueda por fecha desplegando ensayos
			 public function falla7_ensayo_busqueda_fecha(){
			 	 
			    
			 	$fecha7 = $_POST['fecha'];
			 	

			 	

			 	//Abre el mixer


	             $datos_mixer =    \DB::table('mixerconsumo')
						        ->join('falla7', function ($join) {

						        	// Fecha que ingreso el usuario en formato DIA/MES/AÑO
								    $fecha7 = $_POST['fecha'];
			 	                   


						        	//Consulta uniendo los registros
						            $join->on('mixerconsumo.Numero_Carga', '=', 'falla7.Numero_Carga')
						            ->where('falla7.Fecha_Falla','=' ,$fecha7);
                                    	

						        })
						        ->groupBy('falla7.Numero_Carga')
						        ->get();
				              

			 	
			    //Abre las fallas
				$datos_falla = Falla7::where('Fecha_Falla','=',$fecha7)
				                ->groupBy('Numero_Carga')	
				                ->get();
		                        
				

				

				return view('falla7' , array(
					'ensayo' => $datos_falla ,
					'mixer' => $datos_mixer ,
					'fecha_busqueda' => $_POST['fecha']

					 ));

			 }   
				   

		   // Envio del formulario
			public function post_falla7(Request_Falla7 $request){

			
				$falla7 = new Falla7($request->all());
				
				$falla7->Numero_Carga = $_POST['Numero_Carga'];

				$falla7->save();


			    //Abre las fallas
				$datos_ensayo = Falla7::all();

				//Abre el mixer
				$datos_mixer = Mixer::where('Numero_Carga','<=' ,$_POST['Numero_Carga'])	
				              ->get();


				

				return view('falla7' , array(
					'ensayo' => $datos_ensayo ,
					'mixer' => $datos_mixer ,
		            'fecha_busqueda' => $_POST['Fecha_Moldeo']
					
					 ));

			}


//Fin flujo falla 7





}

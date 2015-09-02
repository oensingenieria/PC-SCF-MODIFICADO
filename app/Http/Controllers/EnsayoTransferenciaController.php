<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Mixer;
use App\Ensayo;
use App\Transferencias;
use Auth;

use App\Http\Requests\Request_Transferencia;

class EnsayoTransferenciaController extends Controller {


	public function __construct()
	    {
		$this->middleware('auth');
		set_time_limit(600); //60 seconds = 1 minute
		
	     }





//Flujo para transferencias


			public function transferencias(){

				return view('transferencias');
			}  


			public function transferencias_busqueda_fecha(){

				$fecha = $_POST['Parametro'];	

				// Fecha que ingreso el usuario en formato DIA/MES/AÑO
			    $fecha1 = date('Y-m-d',strtotime('-1 days', strtotime($_POST['Parametro'])));
			 	$fecha6 = date('Y-m-d',strtotime('-6 days', strtotime($_POST['Parametro'])));

			 	//Busca los registros entre esas fechas
			    $datos_mixer = Mixer::where('Fecha_de_Carga','<=' ,$fecha1)
							   ->where('Fecha_de_Carga','>=' ,$fecha6)	
							   ->groupBy('Numero_Carga')
				              ->get();
				              

				 //Si el mixer es nulo
                 if(count($datos_mixer) == 0){

			    	return redirect('pc/transferencias')->with('badRequest','No coinciden datos con esa fecha ingresada');

			     }             



			 return view('listadoTransferencias' , array('mixer' => $datos_mixer  , 'fechabusqueda' => $fecha ) );

			}  




			public function transferencias_carga_cilindro($carga){

				$transferencia = null;
	

				$datos = Mixer::where('Numero_Carga' , '=' , $carga)->first();

				if(!is_null($datos)){
				// si es diferente de null el mixer Busca transferencia para crear los cilindros
				$transferencia = Transferencias::where('id_cod_carga','=',$carga)->first();
							  
				}

				//Si no existen los creo
				if(count($transferencia) == 0 & $datos != null){

					
					
					  $cilindro1 = new Transferencias;
		              $cilindro1->id_cod_carga = $carga;
		              $cilindro1->estado = "pendiente";
		              $cilindro1->save();

		              $cilindro2 = new Transferencias;
		              $cilindro2->id_cod_carga = $carga;
		              $cilindro2->estado = "pendiente";
		              $cilindro2->save();


					  $cilindro3 = new Transferencias;
		              $cilindro3->id_cod_carga = $carga;
		              $cilindro3->estado = "pendiente";
		              $cilindro3->save();


		              $cilindros = Transferencias::where('id_cod_carga' , '=' ,  $carga)->get(); 
			


					return view('transferencias' , array('mixer' =>$datos , 'cilindros' => $cilindros 
			    		 ));


             

				}


				//Si existe y realizo busqueda carga , despliego cilindro
				if(count($transferencia) > 0 & $datos != null){
		 			
		 		    $cilindros = Transferencias::where('id_cod_carga' , '=' ,  $carga)->get();
		 				

		 			return view('transferencias' , array('mixer' =>$datos, 'cilindros' => $cilindros ));

				}


				//Si el mixer es nulo

				if(is_null($datos)){

			    	return redirect('pc/transferencias')->with('badRequest','No coinciden datos con esa fecha ingresada');

			    }



			}



			public function transferencias_busqueda_carga(){
				$transferencia = null;

				$numero = $_POST['Parametro'];	

				$datos = Mixer::where('Numero_Carga' , '=' , $numero)->first();

				if(!is_null($datos)){
				// si es diferente de null el mixer Busca transferencia para crear los cilindros
				$transferencia = Transferencias::where('id_cod_carga','=',$datos->Numero_Carga)->first();
					
				  //Tambien busco que el ensayo exista

				   $ensayo = Ensayo::where('Fecha_Carga','=',$datos->Fecha_de_Carga)->first(); 
				  
				   if(is_null($ensayo))
					   	{
					   	
					   	return view('transferencias' ,
					   	array('ensayo'=>0 , 'newensayo' => $datos));

					     }
				}

				
				//Si no existen cilindros , los creo para esa carga
				if(count($transferencia) == 0 & $datos != null){

					$mixer = Mixer::where('Numero_Carga' , '=' , $numero)->first();

		            $codigo = $mixer->Numero_Carga;	

					
					  $cilindro1 = new Transferencias;
		              $cilindro1->id_cod_carga = $codigo;
		              $cilindro1->estado = "pendiente";
		              $cilindro1->save();

		              $cilindro2 = new Transferencias;
		              $cilindro2->id_cod_carga = $codigo;
		              $cilindro2->estado = "pendiente";
		              $cilindro2->save();


					  $cilindro3 = new Transferencias;
		              $cilindro3->id_cod_carga = $codigo;
		              $cilindro3->estado = "pendiente";
		              $cilindro3->save();


		              $cilindros = Transferencias::where('id_cod_carga' , '=' ,  $mixer->Numero_Carga)->get(); 
			


					return view('transferencias' , array('mixer' =>$datos , 'cilindros' => $cilindros 
			    		 ));



				}
				//Si existe y realizo busqueda carga , despliego cilindro
				if(count($transferencia) > 0 & $datos != null){
		 			
		 			$mixer= Mixer::where('Numero_Carga' , '=' , $numero)->first();
		 		    $cilindros = Transferencias::where('id_cod_carga' , '=' ,  $mixer->Numero_Carga)->get();
		 				

		 			return view('transferencias' , array('mixer' =>$mixer, 'cilindros' => $cilindros ));

				}

				//Si el mixer es nulo

				if(is_null($datos)){

			    	return redirect('pc/transferencias')->with('badRequest','El numero de carga no fue encontrado');

			    }else
			    {

			    	return view('transferencias' , array('transferencia' =>$datos
			    		 ));
			    }
				
			}  



			public function post_transferencias(Request_Transferencia $request ){


				$transferencia= Transferencias::where('id','=',$request->id)
				->first();
				$transferencia->fecha = $request->fecha;
				$transferencia->hora = $request->hora;
				$transferencia->falla = $request->falla;
				$transferencia->Nombre_Cuenta = Auth::user()->username;
				$transferencia->estado = 'listo';

				$transferencia->save();


				$mixer= Mixer::where('Numero_Carga' , '=' , $transferencia->id_cod_carga)->first();
		 	    $cilindros = Transferencias::where('id_cod_carga' , '=' , $transferencia->id_cod_carga)->get();



				return view('transferencias' , array('mixer' =>$mixer, 'cilindros' => $cilindros ));
				

			}


//Fin Flujo trasferencia


//Busqueda por historial

	public function transferencias_busqueda_fecha_Historial(){

					$fecha = $_POST['Parametro'];	
				

		  //Busca los registros entre esas fechas
		
	      $datos_mixer =    \DB::table('mixerconsumo')
						        ->join('transferencia', function ($join) {

						        	// Fecha que ingreso el usuario en formato DIA/MES/AÑO
								    $fecha1 = date('Y-m-d',strtotime('-1 days', strtotime($_POST['Parametro'])));
								 	$fecha6 = date('Y-m-d',strtotime('-6 days', strtotime($_POST['Parametro'])));

						        	//Consulta uniendo los registros
						            $join->on('mixerconsumo.Numero_Carga', '=', 'transferencia.id_cod_carga')
						            ->where('mixerconsumo.Fecha_de_Carga','<=' ,$fecha1)
                                    ->where('mixerconsumo.Fecha_de_Carga','>=' ,$fecha6);	

						        })
						        ->groupBy('Numero_Carga')
						        ->get();
				              
						        
				 //Si el mixer es nulo
                 if(count($datos_mixer) == 0){

			    	return redirect('pc/transferencias')->with('badRequest','No coinciden datos con esa fecha ingresada');

			     }             


			 return view('listadoTransferencias' , array('mixer' => $datos_mixer  , 
			 	                                         'fechabusqueda' => $fecha , 
			 	                                         'historial'=>true) );

			}



public function transferencias_busqueda_carga_Historial(){
		$carga = $_POST['Parametro'];	

		  //Busca los registros entre esas fechas
		
	      $datos_mixer =    \DB::table('mixerconsumo')
						        ->join('transferencia', function ($join) {

						        	$carga = $_POST['Parametro'];	

						        	//Consulta uniendo los registros
						            $join->on('mixerconsumo.Numero_Carga', '=', 'transferencia.id_cod_carga')
						            ->where('mixerconsumo.Numero_Carga','=' ,$carga);
                                  	

						        })
						        ->groupBy('Numero_Carga')
						        ->get();
				              
						        
				 //Si el mixer es nulo
                 if(count($datos_mixer) == 0){

			    	return redirect('pc/transferencias')->with('badRequest','No coinciden datos con esa fecha ingresada');

			     }             


			 return view('listadoTransferencias' , array('mixer' => $datos_mixer  , 
			 	                                         'fechabusqueda' => $carga , 
			 	                                         'historial'=>true) );

			}


//Fin busqueda por historial






}

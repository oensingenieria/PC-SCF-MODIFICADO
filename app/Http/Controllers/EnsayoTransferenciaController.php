<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Mixer;
use App\Ensayo;
use App\Transferencias;
use Auth;
use App\Trabajabilidad;
use App\Encargado;

use App\Http\Requests\Request_Transferencia;

class EnsayoTransferenciaController extends Controller {


	public function __construct()
	    {
		$this->middleware('auth');
		set_time_limit(600); //60 seconds = 1 minute
		
	     }

//Flujo para transferencias


			public function transferencias(){

				return view('transferencias', array('titlemesage' => 'TRASFERENCIAS'));
			}  

//Busqueda de ensayos pendientes

			public function transferencias_busqueda_fecha(){

				
				// Fecha que ingreso el usuario en formato DIA/MES/AÑO
			    $fecha1 = date('Y-m-d',strtotime('-1 days', strtotime($_POST['Parametro'])));
			 	$fecha6 = date('Y-m-d',strtotime('-6 days', strtotime($_POST['Parametro'])));

			 	//Filtrando registros desde trabajabilidad
				  $carga = Trabajabilidad::where('revenimiento.Fecha_Ensayo','<=' ,$fecha1)
				  						->where('revenimiento.Fecha_Ensayo','>=' ,$fecha6)
				  						->where('revenimiento.transferencia',1)
				  						->whereNotExists(function($query)
								            {
								                $query->select(\DB::raw(1))
								                      ->from('transferencia')
								                      ->whereRaw('transferencia.Numero_Carga = revenimiento.Numero_Carga');
								            })
				  						->join('mixerconsumo', function ($join) {
								            $join->on('mixerconsumo.Numero_Carga', '=', 'revenimiento.Numero_Carga');
								                
								        })
								        ->groupBy('revenimiento.Numero_Carga')
				  						->get();

			   //Carga encargados disponibles     
			   $encargados = Encargado::all(); 						
				  					
			    
				return view('transferencias' , array(
					'carga' => $carga ,
					'encargados' =>$encargados,
					'titlemesage' => 'LISTADO DE ENSAYOS TRASNFERENCIA APARTIR DE '.$_POST['Parametro']

					 ));

			}  

//Envio del formulario
		
		public function post_transferencias(Request_Transferencia $request ){


				$transferencia = new Transferencias($request->all());
				$transferencia->Nombre_Cuenta = Auth::user()->username;
				
				//Calculos de edades
				 
				 //edad falla1 (hora falla - hora carga * (24 *(Fecha falla - Fecha carga)) )
				 $difhoras = $this->restahoras($_POST['Hora_Carga'] , $_POST['Hora_f1'] ); // hora falla - hora carga
					 $fecha_carga = new \DateTime($_POST['Fecha_Ensayo']);
	                 $fecha_falla = new \DateTime($_POST['Fecha_Registro']);
				 $diffechas = $fecha_falla->diff( $fecha_carga)->d; // Fecha falla - Fecha carga

				 $EdadFalla1= abs($difhoras - (24*($diffechas)));
			    
				
				 //edad falla1 (hora falla - hora carga * (24 *(Fecha falla - Fecha carga)) )
				 $difhoras = $this->restahoras($_POST['Hora_Carga'] , $_POST['Hora_f2'] ); // hora falla - hora carga
					 $fecha_carga = new \DateTime($_POST['Fecha_Ensayo']);
	                 $fecha_falla = new \DateTime($_POST['Fecha_Registro']);
				 $diffechas = $fecha_falla->diff( $fecha_carga)->d; // Fecha falla - Fecha carga

				 $EdadFalla2= abs($difhoras - (24*($diffechas)));

				 //edad falla1 (hora falla - hora carga * (24 *(Fecha falla - Fecha carga)) )
				 $difhoras = $this->restahoras($_POST['Hora_Carga'] , $_POST['Hora_f3'] ); // hora falla - hora carga
					 $fecha_carga = new \DateTime($_POST['Fecha_Ensayo']);
	                 $fecha_falla = new \DateTime($_POST['Fecha_Registro']);
				 $diffechas = $fecha_falla->diff( $fecha_carga)->d; // Fecha falla - Fecha carga

				 $EdadFalla3= abs($difhoras - (24*($diffechas)));

				 //Salvando calculos
				 $transferencia->Edad_f1 = $EdadFalla1;
				 $transferencia->Edad_f2 = $EdadFalla2;
				 $transferencia->Edad_f3 = $EdadFalla3;

				 //Promedio de las fallas
				 $indice = 0;
				 if ($transferencia->Falla1 > 0 ) { $indice++; }
				 if ($transferencia->Falla2 > 0 ) { $indice++; }
				 if ($transferencia->Falla3 > 0 ) { $indice++; }
				 if ($indice == 0 ) { $indice = 1; }
				 $promedio = ($transferencia->Falla1 + $transferencia->Falla2 + $transferencia->Falla3)/$indice;

				 //Salvando promedio
				 $transferencia->Promedio_Carga = $promedio;
				 
				 $transferencia->save();


				



				dd('ok');
				

			}



//Busqueda historial

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


//Metodo para restar las diferentes horas 

private function restahoras ($hora1,$hora2){

return abs($hora1 - $hora2);

}



}

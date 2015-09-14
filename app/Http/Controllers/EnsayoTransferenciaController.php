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
					'titlemesage' => 'LISTADO DE ENSAYOS TRANSFERENCIA APARTIR DE '.$_POST['Parametro']

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


				 return redirect('/pc/transferencias/save/'.$transferencia->Fecha_Ensayo)->with('success','Ensayo ingresado');

			}



//Busqueda historial


	 			public function transferencia_historial_busqueda_fecha(){
				 	 
				 
				 	
							 //Abre el historial
				             $carga = Transferencias::where('transferencia.Fecha_Ensayo' , $_POST['fecha'])
					                          ->join('mixerconsumo', 'transferencia.Numero_Carga', '=', 'mixerconsumo.Numero_Carga')
					 						  ->groupBy('transferencia.Numero_Carga')
					 						  ->get();
						
									 
							return view('transferencias_historial' , array(
								'carga' => $carga ,
								'titlemesage' => 'LISTADO TRASFERENCIAS POR FECHA '.$_POST['fecha'] 
								
								 ));

				 }   
				

			 	 public function transferencia_historial_busqueda_carga(){
			 	 
			 
			 	
						 //Abre el historial
			             $carga = Transferencias::where('transferencia.Numero_Carga',$_POST['carga'])
			             				->join('mixerconsumo', 'transferencia.Numero_Carga', '=', 'mixerconsumo.Numero_Carga')  
								        ->groupBy('transferencia.Numero_Carga')
								        ->get();
						                           

								 
						return view('transferencias_historial' , array(
							'carga' => $carga ,
							'titlemesage' => 'LISTADO TRASFERENCIAS POR CARGA '.$_POST['carga'] 
							
							 ));

			 }  


			 	 public function transferencia_historial_busqueda_rango(){
			 	 
			 
			      $carga = Transferencias::where('transferencia.Fecha_Ensayo', '>=', $_POST['Desde'] )
			                   ->where('transferencia.Fecha_Ensayo', '<=', $_POST['Hasta'] )
			                   ->join('mixerconsumo', 'transferencia.Numero_Carga', '=', 'mixerconsumo.Numero_Carga') 
		                       ->groupBy('transferencia.Numero_Carga')
					           ->get();


				return view('transferencias_historial' , array(
					'carga' => $carga ,
					'titlemesage' => 'CONSULTA POR FECHA DESDE '.$_POST['Desde']. ' HASTA '.$_POST['Hasta'].'. ENSAYOS TRANSFERENCIAS REALIZADOS.'


					) );

			 }  



//Fin busqueda por historial


//Metodo para restar las diferentes horas 

			private function restahoras ($hora1,$hora2){

			return abs($hora1 - $hora2);

			}


//redirect

			public function redirect_transferencia($fecha){
				//Abre el historial
			             $carga = Transferencias::where('transferencia.Fecha_Ensayo' , $fecha)
				                          ->join('mixerconsumo', 'transferencia.Numero_Carga', '=', 'mixerconsumo.Numero_Carga')
				 						  ->groupBy('transferencia.Numero_Carga')
				 						  ->get();
					
								 
						return view('transferencias_historial' , array(
							'carga' => $carga ,
							'titlemesage' => 'LISTADO TRASFERENCIAS POR FECHA '.$fecha 
							
							 ));

			}


}

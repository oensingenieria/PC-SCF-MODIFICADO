<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Mixer;
use App\Falla7;
use App\Trabajabilidad;
use App\Encargado;


use App\Http\Requests\Request_Falla7;//Solicitud falla 7

use Auth;


class EnsayoFalla7Controller extends Controller {

			public function __construct()
	    {
		$this->middleware('auth');
		
	     }


//Primera vista de las fallas
			public function falla7(){

				return view('falla7', array('titlemesage' => 'FALLA 7' ));
			}   




 // Busqueda por fecha omitiendo los ensayos	
			public function falla7_busqueda_fecha(){
		       
			    
			    // Fecha que ingreso el usuario en formato DIA/MES/AÑO
			    $fecha7 = date('Y-m-d',strtotime('-7 days', strtotime($_POST['fecha'])));
			 	$fecha12 = date('Y-m-d',strtotime('-12 days', strtotime($_POST['fecha'])));
		       
			 
				//Filtrando registros desde trabajabilidad
				  $carga = Trabajabilidad::where('revenimiento.Fecha_Ensayo','<=' ,$fecha7)
				  						->where('revenimiento.Fecha_Ensayo','>=' ,$fecha12)
				  						->where('revenimiento.falla',1)
				  						->whereNotExists(function($query)
								            {
								                $query->select(\DB::raw(1))
								                      ->from('falla7')
								                      ->whereRaw('falla7.Numero_Carga = revenimiento.Numero_Carga');
								            })
				  						->join('mixerconsumo', function ($join) {
								            $join->on('mixerconsumo.Numero_Carga', '=', 'revenimiento.Numero_Carga');
								                
								        })
								        ->groupBy('revenimiento.Numero_Carga')
				  						->get();


			//Obteniendo los realizados

				$fechacarga = Trabajabilidad::where('revenimiento.Fecha_Ensayo','<=' ,$fecha7)
                                             ->where('revenimiento.Fecha_Ensayo','>=' ,$fecha12)
                                             ->first();						
				  if(count($fechacarga) > 0 ) { 
					  	    //Abre el historial
			             $historial = Falla7::where('falla7.Fecha_Carga',$fechacarga->Fecha_Carga)  
								        ->groupBy('falla7.Numero_Carga')
								        ->get();
												}        
					else{
						$historial = null ;
					}	  						


			   //Carga encargados disponibles     
			   $encargados = Encargado::all(); 						
				  					

			    
				return view('falla7' , array(
					'carga' => $carga ,
					'encargados' =>$encargados,
					'historial' => $historial,
					'titlemesage' => 'LISTADO DE ENSAYOS FALLA 7 ENTRE '.$fecha7.' Y '.$fecha12

					 ));

		          
			    }


// Envio del formulario
			public function post_falla7(Request_Falla7 $request){

			
				$falla7 = new Falla7($request->all());
				$falla7->Numero_Carga = $_POST['Numero_Carga'];
				$falla7->Nombre_Cuenta= Auth::user()->username;
				$falla7->save();

				return redirect('/pc/falla7/save/'.$falla7->Fecha_Carga)->with('success','Ensayo ingresado');
			    
			}    



 //Busqueda Falla 7 historial

			 public function falla7_historial_busqueda_fecha(){
			 	 
			 
			 	
						 //Abre el historial
			             $carga = Falla7::where('falla7.Fecha_Ensayo',$_POST['fecha'])  
								        ->groupBy('falla7.Numero_Carga')
								        ->get();
						                           

								 
						return view('falla7_historial' , array(
							'carga' => $carga ,
							'titlemesage' => 'LISTADO FALLA 7 POR FECHA '.$_POST['fecha'] 
							
							 ));

			 }   
				

			 	 public function falla7_historial_busqueda_carga(){
			 	 
			 
			 	
						 //Abre el historial
			             $carga = Falla7::where('falla7.Numero_Carga',$_POST['carga'])  
								        ->groupBy('falla7.Numero_Carga')
								        ->get();
						                           

								 
						return view('falla7_historial' , array(
							'carga' => $carga ,
							'titlemesage' => 'LISTADO FALLA 7 POR CARGA '.$_POST['carga'] 
							
							 ));

			 }  


			 	 public function falla7_historial_busqueda_rango(){
			 	 
			 
			      $carga = falla7::where('falla7.Fecha_Ensayo', '>=', $_POST['Desde'] )
			                   ->where('falla7.Fecha_Ensayo', '<=', $_POST['Hasta'] )
		                       ->groupBy('falla7.Numero_Carga')
					           ->get();


				return view('falla7_historial' , array(
					'carga' => $carga ,
					'titlemesage' => 'CONSULTA POR FECHA DESDE '.$_POST['Desde']. ' HASTA '.$_POST['Hasta'].'. ENSAYOS FALLA 7 REALIZADOS.'


					) );

			 }  




//Redirect

			 public function redirect_falla7($fecha){

			 	   //Filtrando registros desde trabajabilidad
				  $carga = Trabajabilidad::where('revenimiento.Fecha_Carga','=' ,$fecha)
				  						->where('revenimiento.falla',1)
				  						->whereNotExists(function($query)
								            {
								                $query->select(\DB::raw(1))
								                      ->from('falla7')
								                      ->whereRaw('falla7.Numero_Carga = revenimiento.Numero_Carga');
								            })
				  						->join('mixerconsumo', function ($join) {
								            $join->on('mixerconsumo.Numero_Carga', '=', 'revenimiento.Numero_Carga');
								                
								        })
								        ->groupBy('revenimiento.Numero_Carga')
				  						->get();


			
			//Obteniendo los realizados

				$fechacarga = Trabajabilidad::where('revenimiento.Fecha_Carga','<=' ,$fecha)
                                             ->first();						
				  if(count($fechacarga) > 0 ) { 
					  	    //Abre el historial
			             $historial = Falla7::where('falla7.Fecha_Carga',$fechacarga->Fecha_Carga)  
								        ->groupBy('falla7.Numero_Carga')
								        ->get();
												}        
					else{
						$historial = null ;
					}	  				  						


			   //Carga encargados disponibles     
			   $encargados = Encargado::all(); 						
				  					

			    
				return view('falla7' , array(
					'carga' => $carga ,
					'encargados' =>$encargados,
					'historial' => $historial,
					'titlemesage' => 'LISTADO DE ENSAYOS FALLA 7 PENDIENTES'

					 ));


			 }

//Fin flujo falla 7





}

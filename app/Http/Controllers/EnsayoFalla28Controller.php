<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;


use App\Mixer; // Modelo Mixer
use App\Falla28;
use App\Trabajabilidad;
use App\Encargado;
use Auth;


use App\Http\Requests\Request_Falla28;//Solicitud falla 28

class EnsayoFalla28Controller extends Controller {

public function __construct()
	{
		$this->middleware('auth');
		set_time_limit(600); //60 seconds = 1 minute
		
	}




//Flujo falla 28

			public function falla28(){

				return view('falla28' , array('titlemesage' => 'FALLA 28' ) );
			}   




// Busqueda por fecha omitiendo los ensayos de falla 28 realizados
			public function falla28_busqueda_fecha(){
		       
			    
			    // Fecha que ingreso el usuario en formato DIA/MES/AÑO
			    $fecha28 = date('Y-m-d',strtotime('-28 days', strtotime($_POST['fecha'])));
			 	$fecha33 = date('Y-m-d',strtotime('-33 days', strtotime($_POST['fecha'])));
		       
				
				//Filtrando registros desde trabajabilidad
				  $carga = Trabajabilidad::where('revenimiento.Fecha_Ensayo','<=' ,$fecha28)
				  						->where('revenimiento.Fecha_Ensayo','>=' ,$fecha33)
				  						->where('revenimiento.falla',1)
				  						->whereNotExists(function($query)
								            {
								                $query->select(\DB::raw(1))
								                      ->from('falla28')
								                      ->whereRaw('falla28.Numero_Carga = revenimiento.Numero_Carga');
								            })
				  						->join('mixerconsumo', function ($join) {
								            $join->on('mixerconsumo.Numero_Carga', '=', 'revenimiento.Numero_Carga');
								                
								        })
								        ->groupBy('revenimiento.Numero_Carga')
				  						->get();

			   //Carga encargados disponibles     
			   $encargados = Encargado::all(); 						
				  					
			    
				return view('falla28' , array(
					'carga' => $carga ,
					'encargados' =>$encargados,
					'titlemesage' => 'LISTADO DE ENSAYOS FALLA 28 DESDE '.$fecha28.' HASTA '.$fecha33

					 ));

		          
			    }


// Envio del formulario
			public function post_falla28(Request_Falla28 $request){

			
				$falla28 = new Falla28($request->all());
				
				$falla28->Numero_Carga = $_POST['Numero_Carga'];
				$falla28->Nombre_Cuenta= Auth::user()->username;
				
				$falla28->save();
  
  				return redirect('/pc/falla28/save/'.$falla28->Fecha_Ensayo)->with('success','Ensayo ingresado');

			}


//Busqueda Falla 28 historial

			 public function falla28_historial_busqueda_fecha(){
			 	 
			 
			 	
						 //Abre el historial
			             $carga = Falla28::where('falla28.Fecha_Ensayo',$_POST['fecha'])  
								        ->groupBy('falla28.Numero_Carga')
								        ->get();
						                           

								 
						return view('falla28_historial' , array(
							'carga' => $carga ,
							'titlemesage' => 'LISTADO FALLA 28 POR FECHA '.$_POST['fecha'] 
							
							 ));

			 }   
				

			 	 public function falla28_historial_busqueda_carga(){
			 	 
			 
			 	
						 //Abre el historial
			             $carga = Falla28::where('falla28.Numero_Carga',$_POST['carga'])  
								        ->groupBy('falla28.Numero_Carga')
								        ->get();
						                           

								 
						return view('falla28_historial' , array(
							'carga' => $carga ,
							'titlemesage' => 'LISTADO FALLA 28 POR CARGA '.$_POST['carga'] 
							
							 ));

			 }  


			 	 public function falla28_historial_busqueda_rango(){
			 	 
			 
			      $carga = falla28::where('falla28.Fecha_Ensayo', '>=', $_POST['Desde'] )
			                   ->where('falla28.Fecha_Ensayo', '<=', $_POST['Hasta'] )
		                       ->groupBy('falla28.Numero_Carga')
					           ->get();


				return view('falla28_historial' , array(
					'carga' => $carga ,
					'titlemesage' => 'CONSULTA POR FECHA DESDE '.$_POST['Desde']. ' HASTA '.$_POST['Hasta'].'. ENSAYOS FALLA 28 REALIZADOS.'


					) );

			 }  


//Redirect

			 public function redirect_falla28($fecha){

			 	 //Abre el historial
			             $carga = Falla28::where('falla28.Fecha_Ensayo',$fecha)  
								        ->groupBy('falla28.Numero_Carga')
								        ->get();
						                           

								 
						return view('falla28_historial' , array(
							'carga' => $carga ,
							'titlemesage' => 'LISTADO FALLA 28 POR FECHA '.$fecha 
							
							 ));

			 }


//Fin flujo falla 28



}

<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Mixer;
use App\Vebe;
use App\Trabajabilidad;
use App\Encargado;
use Auth;

use App\Http\Requests\Request_Vebe;//Solicitud Vebe

class EnsayoVebeController extends Controller {

	public function __construct()
	    {
		$this->middleware('auth');
		set_time_limit(600); //60 seconds = 1 minute
		
	     }



	// flujo vebe


			public function vebe(){

				return view('vebe' , array('titlemesage' => 'VEBE'));
			}  

//Busqueda de ensayos pendientes

		   // Busqueda por fecha vebe
			public function vebe_busqueda_fecha(){
		       
			   
			    //Establece los codigos permitidos
			    $codigo = array(  '10017415', '10017414');
		       
			    
		
				 //Filtrando registros desde trabajabilidad
				  $carga = Trabajabilidad::where('revenimiento.Fecha_Ensayo', $_POST['fecha'])
				  						->where('revenimiento.vebe',1)
				  						->whereIn('revenimiento.Codigo_Diseño',$codigo)
				  						->whereNotExists(function($query)
								            {
								                $query->select(\DB::raw(1))
								                      ->from('vebe')
								                      ->whereRaw('vebe.Numero_Carga = revenimiento.Numero_Carga');
								            })
				  						->join('mixerconsumo', function ($join) {
								            $join->on('mixerconsumo.Numero_Carga', '=', 'revenimiento.Numero_Carga');
								                
								        })
								        ->groupBy('revenimiento.Numero_Carga')
				  						->get();

			   //Carga encargados disponibles     
			   $encargados = Encargado::all(); 						
				  					
			    
				return view('vebe' , array(
					'carga' => $carga ,
					'encargados' =>$encargados,
					'titlemesage' => 'LISTADO DE ENSAYOS VEBE POR FECHA '.$_POST['fecha']

					 ));

		          
			    } 


//Busqueda de ensayos pendientes


			    public function post_vebe(Request_Vebe $request){
				
		       $datos = new Vebe($request->all());
		       $datos->Nombre_Cuenta = Auth::user()->username;
		       $datos->save();

			   
			   //Abre el historial
			            $carga = Vebe::where('Vebe.Fecha_Ensayo',$_POST['Fecha_Ensayo']) 
			             				->join('mixerconsumo', 'vebe.Numero_Carga', '=', 'mixerconsumo.Numero_Carga')   
								        ->groupBy('vebe.Numero_Carga')
								        ->get();
						                           

								 
						return view('vebe_historial' , array(
							'carga' => $carga ,
							'titlemesage' => 'ENSAYO VEBE '.$_POST['Numero_Carga'].' INGRESADO CON EXITO!' 
							
							 ));


			}

// Fin flujo vebe


//Busqueda por historial vebe


		public function vebe_busqueda_fecha_historial(){
					    
					    
						 //Abre el historial
			             $carga = Vebe::where('Vebe.Fecha_Ensayo',$_POST['Parametro']) 
			             				->join('mixerconsumo', 'vebe.Numero_Carga', '=', 'mixerconsumo.Numero_Carga')   
								        ->groupBy('vebe.Numero_Carga')
								        ->get();
						                           

								 
						return view('vebe_historial' , array(
							'carga' => $carga ,
							'titlemesage' => 'LISTADO VEBE POR FECHA '.$_POST['Parametro'] 
							
							 ));



		}




		public function vebe_busqueda_carga_historial(){

					    
						 //Abre el historial
			             $carga = Vebe::where('Vebe.Numero_Carga',$_POST['Parametro']) 
			             				->join('mixerconsumo', 'vebe.Numero_Carga', '=', 'mixerconsumo.Numero_Carga')   
								        ->groupBy('vebe.Numero_Carga')
								        ->get();
						                           

								 
						return view('vebe_historial' , array(
							'carga' => $carga ,
							'titlemesage' => 'LISTADO VEBE POR CARGA '.$_POST['Parametro'] 
							
							 ));



		}

		//Busqueda por rangos de fecha
        public function vebe_busqueda_rango_historial(){

	
				$carga = \DB::table('vebe')
			        ->join('mixerconsumo', function ($join) {
			        	
			        	

			            $join->on('mixerconsumo.Numero_Carga', '=', 'vebe.Numero_Carga')
			                 ->where('vebe.Fecha_Ensayo', '>=', $_POST['Desde'] )
			                 ->where('vebe.Fecha_Ensayo', '<=', $_POST['Hasta'] );


			        })
			        ->groupBy('vebe.Numero_Carga')
			        ->get();


				return view('vebe_historial' , array(
					'carga' => $carga ,
					'titlemesage' => 'CONSULTA POR FECHA DESDE '.$_POST['Desde']. ' HASTA '.$_POST['Hasta'].'. ENSAYOS VEBE REALIZADOS.'


					) );
					
       }


}

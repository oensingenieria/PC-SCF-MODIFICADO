<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Mixer;
use App\Vebe;
use App\Trabajabilidad;

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
				  $carga = Trabajabilidad::where('Fecha_Ensayo', $_POST['fecha'])
				  						->where('vebe',1)
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
				  				
			    
				return view('vebe' , array(
					'carga' => $carga ,
					'titlemesage' => 'LISTO DE ENSAYOS VEBE POR FECHA '.$_POST['fecha']

					 ));

		          
			    } 


//Busqueda de ensayos pendientes


			    public function post_vebe(Request_Vebe $request){
				
		       $datos = new Vebe($request->all());
		       $datos->save();

			   
			   //Filtrado de codigos
			     $codigo = array(  'L20', '7T1/2-2T3/8' ,'7 Tor, 3/8',
								  'LP25E','03-02-10-L25','L25W',
								  '03-10-56-LE','LP25E','5T 1/2',
								  'LP25E','5t, 1/2.','LP25E','03-02-10-M',
								  '03-10-56-LE','03-02-09-Lex','14122-08-Lex',
								  '6 Tr / 3/8','7t1/2,2t3/8.','5t0.6','5 T, 1/2',
								  '6 Tr / 3/8','5t1/2t');

			    $fecha= Mixer::where('Numero_Carga' , $_POST['Vebe_Carga'])
				               ->first();
		       
			    //Abre el mixer donde la fecha coincide y el codigo es encontrado
				$datos_mixer = Mixer::where('Fecha_de_Carga','=' , $fecha->Fecha_de_Carga)
							  ->whereIn('Codigo_Elemento',$codigo)	
				              ->get();
				            
				
				//Abre fallas con otro nombre . para comparar unicamente 
				$datos_falla = Vebe::all();
				              
		            
		       	
				return view('vebe' , array(
					'mixer' => $datos_mixer ,
					'fecha_busqueda' => $fecha->Fecha_de_Carga ,
					'comparaensayo' => $datos_falla 
					//'res_nominal' => $res_nominal

					 ));


			}

// Fin flujo vebe


//Busqueda por historial vebe


		public function vebe_busqueda_fecha_historial(){
					    
					    
						 //Abre el mixer
			             $datos_mixer =    \DB::table('mixerconsumo')
								        ->join('vebe', function ($join) {

								        	//Filtrado de codigos
					       $codigo = array(  'L20', '7T1/2-2T3/8' ,'7 Tor, 3/8',
										  'LP25E','03-02-10-L25','L25W',
										  '03-10-56-LE','LP25E','5T 1/2',
										  'LP25E','5t, 1/2.','LP25E','03-02-10-M',
										  '03-10-56-LE','03-02-09-Lex','14122-08-Lex',
										  '6 Tr / 3/8','7t1/2,2t3/8.','5t0.6','5 T, 1/2',
										  '6 Tr / 3/8','5t1/2t');


								        	//Consulta uniendo los registros
								            $join->on('mixerconsumo.Numero_Carga', '=', 'vebe.Vebe_Carga')
								            ->where('vebe.Fecha','=' , $_POST['Parametro']);
		                                    
								            
								        })
								        ->groupBy('vebe.Vebe_Carga')
								        ->get();
						                           

								        


						//Nota mejorar consulta , no traer todos los registros vebes existentes
						//Abre fallas con otro nombre . para comparar unicamente 
						$datos_falla = Vebe::all();
						              
				            
				       	
						return view('vebe' , array(
							'mixer' => $datos_mixer ,
							'fecha_busqueda' => $_POST['Parametro'] ,
							'comparaensayo' => $datos_falla 
							//'res_nominal' => $res_nominal

							 ));



		}




		public function vebe_busqueda_carga_historial(){

					     //Abre el mixer
			             $datos_mixer =    \DB::table('mixerconsumo')
								        ->join('vebe', function ($join) {

								        	//Filtrado de codigos
					       $codigo = array(  'L20', '7T1/2-2T3/8' ,'7 Tor, 3/8',
										  'LP25E','03-02-10-L25','L25W',
										  '03-10-56-LE','LP25E','5T 1/2',
										  'LP25E','5t, 1/2.','LP25E','03-02-10-M',
										  '03-10-56-LE','03-02-09-Lex','14122-08-Lex',
										  '6 Tr / 3/8','7t1/2,2t3/8.','5t0.6','5 T, 1/2',
										  '6 Tr / 3/8','5t1/2t');


								        	//Consulta uniendo los registros
								            $join->on('mixerconsumo.Numero_Carga', '=', 'vebe.Vebe_Carga')
								            ->where('vebe.Vebe_Carga','=' , $_POST['Parametro']);
		                                    
								            
								        })
								        ->groupBy('vebe.Vebe_Carga')
								        ->get();
						                           


						//Nota mejorar consulta , no traer todos los registros vebes existentes
						//Abre fallas con otro nombre . para comparar unicamente 
						$datos_falla = Vebe::all();
						              
				            
				       	
						return view('vebe' , array(
							'mixer' => $datos_mixer ,
							'fecha_busqueda' => $_POST['Parametro'] ,
							'comparaensayo' => $datos_falla 
							//'res_nominal' => $res_nominal

							 ));


		}




}

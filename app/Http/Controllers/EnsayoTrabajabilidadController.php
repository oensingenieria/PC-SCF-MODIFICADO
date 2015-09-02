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

		        return view('trabajabilidad_flujo' );

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

				$revenimiento_revisado = Trabajabilidad::where('Revision' , '=' , 'Revisado')
										 ->where('Numero_Carga' , $codigo)
				                         ->get();

				return view('trabajabilidad_flujo' , array('mixer' => $mixer , 'revenimiento_re' => $revenimiento_revisado));


			}

			public function consulta_trabajabilidad_codigo(){

				$codigo = $_POST['Parametro'];
				
				
				$mixer = Mixer::where('Codigo_Diseño' , $codigo )->groupBy('Numero_Carga')->get();
				
				$revenimiento_revisado = Trabajabilidad::where('Revision' , '=' , 'Revisado')
									     ->get();

				return view('trabajabilidad_flujo' , array('mixer' => $mixer , 'revenimiento_re' => $revenimiento_revisado));

			}	

			public function consulta_trabajabilidad_boleta(){

			    $codigo = $_POST['Parametro'];
				
				$mixer = Mixer::where('Boleta_Batida' , $codigo )->groupBy('Numero_Carga')->get();
				
				$revenimiento_revisado = Trabajabilidad::where('Revision' , '=' , 'Revisado')->get();

				return view('trabajabilidad_flujo' , array('mixer' => $mixer , 'revenimiento_re' => $revenimiento_revisado));

			}

			public function consulta_trabajabilidad_fecha(){

				$codigo = $_POST['Parametro'];
				
				$mixer = Mixer::where('Fecha_de_Carga' , $codigo )->groupBy('Numero_Carga')->get();
				
				$revenimiento_revisado = Trabajabilidad::where('Revision' , '=' , 'Revisado')
										->where('Fecha_Ensayo' , $codigo)
										->get();

				return view('trabajabilidad_flujo' , array('mixer' => $mixer , 'revenimiento_re' => $revenimiento_revisado));
				

			}



			// Consultas por historial



			public function consulta_trabajabilidad_carga_historial(){

				$codigo = $_POST['Parametro'];
				
				$mixer = Mixer::where("Numero_Carga",$codigo)->groupBy('Numero_Carga')->get();

				$revenimiento_revisado = Trabajabilidad::where('Revision' , '=' , 'Revisado')
                                                         ->where('Numero_Carga' , '=' , $codigo)
				                                         ->get();

				return view('trabajabilidad_flujo' , array('mixer' => $mixer , 'revenimiento_re' => $revenimiento_revisado));

			}

			
			public function consulta_trabajabilidad_fecha_historial(){

				$codigo = $_POST['Parametro'];
				
				
				$revenimiento_revisado = Trabajabilidad::where('Revision' , '=' , 'Revisado')
										->where('Fecha_Ensayo' , $codigo)
										->get();

				//Provisional . se obtiene la fecha de carga del mixer con el numero de carga del ensayo
				//Problema solo trae el primer registro revisado	
				$rev = 	Trabajabilidad::where('Revision' , '=' , 'Revisado')
										->where('Fecha_Ensayo' , $codigo)
										->first();		


				$mixer =  Mixer::where('Numero_Carga' , $rev->Numero_Carga )->groupBy('Numero_Carga')->get();					

               

				return view('trabajabilidad_flujo' , array('mixer' => $mixer, 'revenimiento_re' => $revenimiento_revisado ));
				
			}


//Fin flujo trabajabilidad





}

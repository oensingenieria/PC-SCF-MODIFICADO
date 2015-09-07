<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Moldes;

use App\Mixer; // Modelo Mixer
use App\Ensayo;
use App\Trabajabilidad;

use App\Http\Requests\Request_Yield; //Solicitud yield

use Auth;

class EnsayoYieldController extends Controller {


	public function __construct()
	    {
		$this->middleware('auth');
		set_time_limit(600); //60 seconds = 1 minute
		
	     }


	//Flujo de yield

			public function consulta_yield(){

				return view('yield' , array('titlemesage' => 'YIELD' ));

			}

			
			  public function consulta_yield_ensayo_carga(){

			   //Comprobando si el ensayo ya se realizado en yield
			    $carga_yield = Ensayo::where('Numero_Carga' , '=' , $_POST['carga'] )->first();

				    if(!is_null($carga_yield)){

				    //Uniendo el registro del mixer con la informacion del ensayo
				   $carga = \DB::table('yield')
			            ->join('mixerconsumo', 'yield.Numero_Carga', '=', 'mixerconsumo.Numero_Carga')
			            ->where('yield.Numero_Carga' , '=' , $_POST['carga'] )
			            ->first();

				 
				    return view('yield_historial' , array(
				    	'carga' =>$carga , 
				    	'titlemesage' => 'ENSAYO  '.$_POST['carga'] .'  REALIZADO!'
				    		
				    		 ));

				    }
			   //Fin comprobacion de existencia 


			   //Busca el ensayo realizado en trabajabilidad
			    $carga = Trabajabilidad::where('Numero_Carga' , '=' , $_POST['carga'] )->first();

			    if(is_null($carga)){
			    	return redirect('/pc/yield')->with('badRequest' , 'Ensayo no encontrado');
			    }
			    else{



			         $cemento = Mixer::where('Numero_Carga' , '=' , $_POST['carga'])
			                           ->where('Tipo_Material','=','CEM')
			                           ->first();

				    $agua = Mixer::where('Numero_Carga' , '=' , $_POST['carga'])
				                           ->where('Tipo_Material','=','AGU')
				                           ->first();  


				    $aditivo = Mixer::where('Numero_Carga' , '=' , $_POST['carga'])
				                           ->where('Tipo_Material','=','ADI')
				                           ->first();                                             
				                           

				    $agregado = Mixer::where('Numero_Carga' , '=' , $_POST['carga'])
			                           ->where('Tipo_Material','=','AGR')
			                           ->get();

			        $moldes = Moldes::all();                   

			        $dato_fecha = Mixer::where('Numero_Carga','=', $_POST['carga'])->first();

			   //Uniendo el registro del mixer con la informacion del ensayo
			   $carga = \DB::table('revenimiento')
		            ->join('mixerconsumo', 'revenimiento.Numero_Carga', '=', 'mixerconsumo.Numero_Carga')
		            ->first();
			    
				    

               return view('yield' , array('carga' =>$carga , 
			    		'cemento' =>$cemento ,
			    		'agua' =>$agua ,
			    		'aditivo' =>$aditivo ,
			    		'agregado' =>$agregado ,
			    		'molde' => $moldes ,
			    		'titlemesage' => 'CONSULTA POR NUMERO DE CARGA '.$_POST['carga'] 
			    		

			    		 ));
			    



			       }//End else isnull
			    
			    }


			public function yield_post(Request_Yield $request){

				$yield = new Ensayo($request->all());

				$yield->Nombre_Cuenta = Auth::user()->username;

				$yield->save();

				
				//Uniendo el registro del mixer con la informacion del ensayo
			   $carga = \DB::table('yield')
		            ->join('mixerconsumo', 'yield.Numero_Carga', '=', 'mixerconsumo.Numero_Carga')
		            ->where('yield.Numero_Carga' , '=' , $_POST['Numero_Carga'] )
		            ->first();

			 
			    return view('yield_historial' , array(
			    	'carga' =>$carga , 
			    	'titlemesage' => 'ENSAYO  '.$_POST['Numero_Carga'] .'  REALIZADO!'
			    		
			    		 ));
			}


//Fin de flujo yield



//Busqueda historial yield


public function consulta_yield_historial_fecha(){

	$fecha = $_POST['fecha'];

	$carga = Ensayo::where('Fecha_Carga' , '=' , $fecha)
		     ->get();

	return view('listadoYields' , array('carga' => $carga));

}


public function consulta_yield_historial_carga(){

     $carga = $_POST['carga'];

	$carga = Ensayo::where('Numero_Carga' , '=' , $carga)
		     ->get();

	return view('listadoYields' , array('carga' => $carga));


}

//Busqueda historial
public function muestra_historial_yield($codigo){


			    $carga = Mixer::where('Numero_Carga' , '=' , $codigo)->first();
			    
			    
			    $cemento = Mixer::where('Numero_Carga' , '=' , $codigo)
			                           ->where('Tipo_Material','=','CEM')
			                           ->first();

			    $agua = Mixer::where('Numero_Carga' , '=' , $codigo)
			                           ->where('Tipo_Material','=','AGU')
			                           ->first();  


			    $aditivo = Mixer::where('Numero_Carga' , '=' , $codigo)
			                           ->where('Tipo_Material','=','ADI')
			                           ->first();                                             
			                           

			    $agregado = Mixer::where('Numero_Carga' , '=' , $codigo)
			                           ->where('Tipo_Material','=','AGR')
			                           ->get();   

			    $molde = Moldes::all();                         


			    $dato_fecha = Mixer::where('Numero_Carga','=', $codigo)->first();
			    
			    if(is_null($dato_fecha)){
			    	$yield = null ;
			    }else{

			     $yield = Ensayo::where('Numero_Carga' , '=' , $codigo)->first();	
			    }
			     
			           	 
			     
			    if($carga == null){

			    	return redirect('pc/yield')->with('badRequest','El numero de carga fue encontrado');

			    }else
			    {



			    	return view('yield' , array('carga' =>$carga , 
			    		'cemento' =>$cemento ,
			    		'agua' =>$agua ,
			    		'aditivo' =>$aditivo ,
			    		'agregado' =>$agregado ,
			    		'molde' =>$molde ,
			    		'yield' => $yield

			    		 ));
			    }

}



//End busqueda historial

}

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

				$molde = Moldes::all(); 

				return view('yield');

			}

			
			  public function consulta_yield_ensayo_carga(){

				$codigo = $_POST['carga'];

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


			public function yield_post(Request_Yield $request){

				$yield = new Ensayo($request->all());

				$yield->Nombre_Cuenta = Auth::user()->username;

				$yield->save();

				$codigo = $_POST['Numero_Carga'];

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

			    return view('yield' , array('carga' =>$carga , 
			    		'cemento' =>$cemento ,
			    		'agua' =>$agua ,
			    		'aditivo' =>$aditivo ,
			    		'agregado' =>$agregado ,
			    		'molde' =>$molde ,
			    		'yield' => $yield

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








       //Post para ingreso de molde en seccion del flujo

	public function molde_post(Request_Molde $request){

		$molde = new Moldes($request->all());

		$exist = Moldes::where('Nombre_Molde' , '=' , $molde->Nombre_Molde)->first();
		if (count($exist) > 0) {
			return redirect('/pc/yield')->with('badRequest','El nombre para ese molde ya existe');
		}


		$molde->save();
		return redirect('/pc/yield')->with('success','El molde fue agregado');

	}

//Fin Post para ingreso de molde en seccion del flujo 



}

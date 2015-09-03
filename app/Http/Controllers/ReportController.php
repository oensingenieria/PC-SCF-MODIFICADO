<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Mixer; // Modelo Mixer
use App\Transferencias;
use App\Falla7;
use App\Falla28;
use Auth;

use Illuminate\Http\Request;

class ReportController extends Controller {
	private $useraccess;

//Constructor comprueba la session . Se pueden utilizar roles para controlar el acceso a diversas partes

	public function __construct()
	{
		$this->middleware('auth');
        $this->useraccess = Auth::user()->username;
		
   }




//Datos para el calculo de promedio transferencia
private $Carga_swith = null;
private $denominador_contador = 0;
private $numerador_contador = 0;
private $promedio;
private $minimo = 99999999;
private $maximo = 0;


private $contador = 0;


function reporte(){

//Check username permission 

if($this->useraccess == 'PPP-IDA12' || $this->useraccess == 'PPP-JFE13' 
   || $this->useraccess == 'PPP-JAB87' || $this->useraccess == 'PPP-GOR77' ){
	return redirect('/')->with('badRequest' , 'No tienes los permisos necesarios');	
}
  
	return view('reportes' );
}


function fecha_resistencia(){

	$fecha = $_POST['fecha'];
	   
    $fallas7 = Falla7::where('Fecha_Molde' , '=' , $fecha)->get();
	return view('reportes' , array('fallas7' => $fallas7 ));
}


function reporte_resistencia(){


    

	return view('reporte_resistencia' );

}


function reporte_agregado(){


    

	return view('reporte_agregado' );

}


function reporte_cemento(){


    

	return view('reporte_cemento' );

}


function reporte_desechos(){


    

	return view('reporte_desechos' );

}




}

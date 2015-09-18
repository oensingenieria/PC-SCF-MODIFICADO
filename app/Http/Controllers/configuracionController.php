<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Trabajabilidad;
use App\Ensayo;
use App\Transferencias;
use App\Falla7;
use App\Falla28;
use App\Vebe;

use App\Tarros;
use App\Encargado;



class configuracionController extends Controller {

	public function index()
	{
	
		return view('configuracion');

	}


	public function buscar_carga(){

		$carga = $_POST['Parametro']; 

		$trabajabilidad = Trabajabilidad::where('Numero_Carga',$carga)->first();
		$yield = Ensayo::where('Numero_Carga',$carga)->first();
		$transferencia = Transferencias::where('Numero_Carga',$carga)->first();
		$falla7 = Falla7::where('Numero_Carga',$carga)->first();
		$falla28 = Falla28::where('Numero_Carga',$carga)->first();
		$vebe = Vebe::where('Numero_Carga',$carga)->first();

		$tarros = Tarros::all();
		$Encargados = Encargado::all();


		return view('mod_ensayo' , array(

			'trabajabilidad' => $trabajabilidad ,
			'yield' => $yield,
			'transferencia' => $transferencia ,
			'falla7' => $falla7 ,
			'falla28' => $falla28 ,
			'vebe' => $vebe ,
			 'tarros'	=>  $tarros,
	         'encargados' => $Encargados
			)  );

	}

	public function actualiza_trababilidad(){

		$trabajabilidad = Trabajabilidad::find($_POST['id']);

		$trabajabilidad->Nombre_Proyecto = $_POST['Nombre_Proyecto'];
		$trabajabilidad->Nombre_Elemento = $_POST['Nombre_Elemento'];
		$trabajabilidad->Hora_Ensayo = $_POST['Hora_Ensayo'];
		$trabajabilidad->Revenimiento = $_POST['Revenimiento'];
		$trabajabilidad->Temperatura = $_POST['Temperatura'];
		$trabajabilidad->Volumen = $_POST['Volumen'];
		$trabajabilidad->Codigo_Tarro = $_POST['Codigo_Tarro'];
		$trabajabilidad->Encargado = $_POST['Encargado'];

        $trabajabilidad->save();

        return redirect('/pc/configuracion')->with('success','Ensayo Modificado');
	}


	public function actualiza_vebe(){

		$vebe = Vebe::find($_POST['id']);

		$vebe->Vebe = $_POST['Vebe'];
		$vebe->Peralte = $_POST['Peralte'];
		$vebe->Volumen = $_POST['Volumen'];
		$vebe->Humedad = $_POST['Humedad'];
		$vebe->Amperimetro = $_POST['Amperimetro'];
		$vebe->Encargado = $_POST['Encargado'];
	

        $vebe->save();

        return redirect('/pc/configuracion')->with('success','Ensayo Modificado');
	}



	public function actualiza_yield(){

		$yield = Ensayo::find($_POST['id']);
	

		$yield->Aditivo1 = $_POST['Aditivo1'];
		$yield->Agua = $_POST['Agua'];
		$yield->Aditivo2 = $_POST['Aditivo2'];
		$yield->Yield = $_POST['Yield'];
		$yield->Volumen_Teorico = $_POST['Volumen_Teorico'];
		$yield->Densidad_Real = $_POST['Densidad_Real'];
		$yield->Volumen_Real = $_POST['Volumen_Real'];
		$yield->Rendimiento_Real = $_POST['Rendimiento_Real'];
		$yield->Encargado = $_POST['Encargado'];
	

        $yield->save();

        return redirect('/pc/configuracion')->with('success','Ensayo Modificado');
	}


	public function actualiza_transferencia(){


		$transferencia = Transferencias::find($_POST['id']);
	

		$transferencia->Falla1 = $_POST['Falla1'];
		$transferencia->Edad_f1 = $_POST['Edad_f1'];
		$transferencia->Falla2 = $_POST['Falla2'];
		$transferencia->Edad_f2 = $_POST['Edad_f2'];
		$transferencia->Falla3 = $_POST['Falla3'];
		$transferencia->Edad_f3 = $_POST['Edad_f3'];
		$transferencia->Promedio_Carga = $_POST['Promedio_Carga'];
		$transferencia->Encargado = $_POST['Encargado'];
		
	

        $transferencia->save();


        return redirect('/pc/configuracion')->with('success','Ensayo Modificado');


	}

	public function actualiza_falla7(){

		$falla7 = Falla7::find($_POST['id']);
	

		$falla7->Lugar_Falla = $_POST['Lugar_Falla'];
		$falla7->Falla1 = $_POST['Falla1'];
		$falla7->Falla2 = $_POST['Falla2'];
		$falla7->Falla3 = $_POST['Falla3'];
        $falla7->Resis_Nominal = $_POST['Resis_Nominal'];
		$falla7->Resis_Promedio = $_POST['Resis_Promedio'];
		$falla7->Resis_Porcentual = $_POST['Resis_Porcentual'];
        $falla7->Encargado = $_POST['Encargado'];
		
	

        $falla7->save();


        return redirect('/pc/configuracion')->with('success','Ensayo Modificado');




	}



     public function actualiza_falla28(){

     	$falla28 = Falla28::find($_POST['id']);
	

		$falla28->Lugar_Falla = $_POST['Lugar_Falla'];
		$falla28->Falla1 = $_POST['Falla1'];
		$falla28->Falla2 = $_POST['Falla2'];
		$falla28->Falla3 = $_POST['Falla3'];
        $falla28->Resis_Nominal = $_POST['Resis_Nominal'];
		$falla28->Resis_Promedio = $_POST['Resis_Promedio'];
		$falla28->Resis_Porcentual = $_POST['Resis_Porcentual'];
        $falla28->Encargado = $_POST['Encargado'];
		
	

        $falla28->save();


        return redirect('/pc/configuracion')->with('success','Ensayo Modificado');

     }





}

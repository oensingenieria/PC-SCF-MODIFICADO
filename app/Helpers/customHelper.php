<?php
	if ( ! function_exists('interval_date')){
		/**
		 * Obtiene la resta de las dos fechas.
		 *
		 * @param  string  $view
		 * @param  array   $data
		 * @param  array   $mergeData
		 * @return \Illuminate\View\View
		 */
		function interval_date($init= null,$finish = null){
			
			//formateamos las fechas a segundos tipo 1374998435
			$diferencia = strtotime($finish) - strtotime($init);
			
			if(!is_numeric($diferencia) || $diferencia<0){
				$tiempo = "Error en fecha";
			}else{
				//comprobamos el tiempo que ha pasado en segundos entre las dos fechas
				//floor devuelve el número entero anterior, si es 5.7 devuelve 5
			if($diferencia < 60){
		     	$tiempo = "" . floor($diferencia) . " segundos";
		    }else if($diferencia > 60 && $diferencia < 3600){
		        $tiempo = "" . floor($diferencia/60) . " minutos'";
		    }else if($diferencia > 3600 && $diferencia < 86400){
		        $tiempo = "" . floor($diferencia/3600) . " horas";
		    }else if($diferencia > 86400 && $diferencia < 2592000){
		        $tiempo = "" . floor($diferencia/86400) . " días";
		    }else if($diferencia > 2592000 && $diferencia < 31104000){
		        $tiempo = "" . floor($diferencia/2592000) . " meses";
		    }else if($diferencia > 31104000){
		        $tiempo = "" . floor($diferencia/31104000) . " año(s)";
		    }else{
		        $tiempo = "Error";
		    }
			    return $tiempo;
			}

		
		}
		
	}
	if ( ! function_exists('geti')){
		function geti(){
				
			return "fino";
		}
	}
@extends('app')

@section('content')

<?php
	
	function calcula_resnominal($res_nominal){

		if (count($res_nominal) == 0) {
			return 0;
		}
		else
		{

			return count($res_nominal);

		}//fin else


	}


    function observacion($id){ 
    
    $recive = null;
    
    $sql ="SELECT * from revenimiento WHERE id_mixer = " . $id ;

    $resultado = connect_Mysql($sql);

    while($data = $resultado->fetch_assoc()){
    // $data es un arreglo asociativo con todos los campos que se pusieron en el select

       $recive =  $data['Observaciones'] ;
   
   }

    if($recive == null)
      {
       
       return "";

      }
      else
        return $recive ;

   }


   function connect_Mysql($sql){

     //realizo la conexion a la base de datos
    $db = new mysqli('localhost', 'pccompany', 'pccompany2015', 'iceberg');
    if($db->connect_errno > 0){
    die('Imposible conectar [' . $db->connect_error . ']');
    }


    //si falla la consulta
    if(!$resultado = $db->query($sql)){
    die('Ocurrio un error cargando el registro [' . $db->error . ']');
    }

    return $resultado;

   }

   function recorreEnsayo($ensayo ,$compara){
   	$pass = true ;

   	foreach ($ensayo as $e) {
   		
   		if($e->Numero_Carga == $compara)
   		{

   			$pass = false;
   		}	


   	}

   		return $pass;

   }





  ?>



<div class="container">
	<div class="row">
	<div class="col-md-12" style="margin-bottom:20px">
	<button class="btn btn-success" data-remodal-target="buscarmixer_modal" >Buscar ensayo</button>
	<button class="btn btn-success" data-remodal-target="buscarensayo_modal" >Buscar Historial</button>
	<input class="btn btn-info pull-right" style="background-color: #32C0AC;" type="button" value="Imprimir" onClick="window.print()">
	</div>
	

		<div class="col-md-12 ">
			<div class="panel panel-default">
				<div class="panel-heading text-center"> @if(isset($fecha_busqueda)) <b>FALLA 7 APARTIR DE LA FECHA:  {{$fecha_busqueda}}</b>  @else <b>FALLA 7</b> @endif</div>
				<div class="panel-body">
				
				<div class="row">
				<div class="col-md-12  ">
			@if(isset($mixer) )
				@if(!is_null($mixer) & count($mixer) > 0  )
				<table class="table table-bordered">
 				
				   <thead class="bg-success">
				      <tr>
				        <td>Acción</td>
				        <td># carga</td>
				        <td>codigo diseño</td>
				        <td>Nombre de proyecto</td>
				        <td>Fecha de carga</td>
				        <td>Falla 1</td>
				        <td>Falla 2</td>
				        <td>Falla 3</td>
				        <td>Promedio</td>
				        <td>Res Nominal</td>
				        <td>Res Porcentaje</td>

				      </tr>
				     </thead>	


				
				     <tbody>

				        @if(isset($ensayo))

				     @foreach($ensayo as $mix)
				     	<tr>
				     	
				     	

					 	<td><button class="btn btn-info " >Realizada</button></td>
				     	<td>{{$mix->Numero_Carga}}</td>
				     	<td>{{$mix->Codigo_Diseño}}</td>
				     	<td>{{$mix->Nombre_Proyecto}}</td>
				     	<td>{{$mix->Fecha_Moldeo}}</td>
				     	<td>{{$mix->Falla1}}</td>
				     	<td>{{$mix->Falla2}}</td>
				     	<td>{{$mix->Falla3}}</td>
				     	<td>{{$mix->Resis_Promedio}}</td>
				     	<td>{{$mix->Resis_Nominal}}</td>
				     	<td>{{$mix->Resis_Porcentual}}</td>
			
				     	

				     </tr>

				     @endforeach

				     @endif
				     
				     @if(isset($mixer))	

				     <?php 
				     $pass = true;
				     $carga = null;

				     

				      ?>
				     	@foreach($mixer as $mix)
				     	<tr>
				     	
				     	<?php 
				     	if ($carga != $mix->Numero_Carga ) {
				     		$pass = true;
				     	}  

				     	?>

				     	@if($pass)
				     	<?php $carga = $mix->Numero_Carga ;
				     		  $pass=false; 	
				     	 ?>
				     	@if(isset($ensayo)) 
				     	 @if(recorreEnsayo( $ensayo , $mix->Numero_Carga))
						 	<td><button data-fechacarga="{{$mix->Fecha_de_Carga}}" data-codigo="{{$mix->Codigo_Diseño}}" data-proyecto="{{$mix->Nombre_Proyecto}}" data-elemento="{{$mix->Nombre_Elemento}}"  class="btn btn-success llenardatos" data-numerocarga="{{$mix->Numero_Carga}}" data-remodal-target="llenardatos_modal" >Seleccionar</button></td>
					     	<td>{{$mix->Numero_Carga}}</td>
					     	<td>{{$mix->Codigo_Diseño}}</td>
					     	<td>{{$mix->Nombre_Proyecto}}</td>
					     	<td>{{$mix->Fecha_de_Carga}}</td>
					     	<td></td>
					     	<td></td>
					     	<td></td>
					     	<td></td>
					     	<td></td>
					     	<td></td>
					     @endif	
					    @endif	

					  	@if(isset($comparaensayo)) 
					      @if(recorreEnsayo( $comparaensayo , $mix->Numero_Carga))
						 	<td><button data-fechacarga="{{$mix->Fecha_de_Carga}}" data-codigo="{{$mix->Codigo_Diseño}}" data-proyecto="{{$mix->Nombre_Proyecto}}" data-elemento="{{$mix->Nombre_Elemento}}"  class="btn btn-success llenardatos" data-numerocarga="{{$mix->Numero_Carga}}" data-remodal-target="llenardatos_modal"  >Seleccionar</button></td>
					     	<td>{{$mix->Numero_Carga}}</td>
					     	<td>{{$mix->Codigo_Diseño}}</td>
					     	<td>{{$mix->Nombre_Proyecto}}</td>
					     	<td>{{$mix->Fecha_de_Carga}}</td>
					     	<td></td>
					     	<td></td>
					     	<td></td>
					     	<td></td>
					     	<td></td>
					     	<td></td>
					     @endif	
				     	@endif
				     	
				     	@endif
			
				     	

				     </tr>
				     
				     @endforeach
				     @endif


				     </tbody>

				</table>

				@else
				
				<p class="bg-danger text-center" style="height:40px;padding-top:10px">Datos no encontrados . Por favor realize una nueva busqueda.</p>
				
				@endif
				
				@else
			<p class="bg-info text-center" style="height:40px;padding-top:10px">Por favor realize una busqueda</p>		
			
          @endif

				</div>
				
				{{--$mixer->render()--}}
			

				</div>
				
				</div>
			</div>
		</div>
	</div>
</div>{{--End Container--}}

{{--Modal busqueda Ensayo--}}
<div class="remodal" data-remodal-id="buscarmixer_modal">
  <button data-remodal-action="close" class="remodal-close"></button>
  <h3 class="bg-success">Seleccione una fecha</h3>
  <br>
  

  <div class="row">
  <div class="col-md-12">
  		<div class="col-md-12">
  			<form class="form-horizontal" method="post" action="/pc/falla7/fecha">
  			<input name="_token" type="hidden" value="{!! csrf_token() !!}" />
  			
  			<div class="form-group"> 
  			<label>Fecha <input required=""  class="form-control datepicker" type="text" name="fecha" placeholder="Seleccione una fecha" style="cursor: pointer; background-color: white;"  required="" readonly=""   /></label>
  			</div>

  			<div class="form-group"> 
  			<button class="btn btn-success" style="margin-bottom:65px;">Buscar</button>
  			</div>
  			<div class="form-group"> 
  			<p  class="bg-info">El sistema traera todos los ensayos correspondientes a 7 dias atras.</p>
  			</div>
  			
  			</form>

  		</div>

  </div>

  </div>
    
</div> {{--Modal busqueda de ensayo--}}



{{--Modal busqueda de falla--}}
<div class="remodal" data-remodal-id="buscarensayo_modal">
  <button data-remodal-action="close" class="remodal-close"></button>
  <h3 class="bg-success">Filtro de busqueda para ensayos</h3>
  <br>
  

  <div class="row">
  <div class="col-md-12">
  		<div class="col-md-12">
  			<form class="form-horizontal" method="post" action="/pc/falla7/fecha/ensayo">
  			<input name="_token" type="hidden" value="{!! csrf_token() !!}" />
  			
  			<div class="form-group"> 
  			<label>Fecha de ensayo <input required=""  class="form-control datepicker" type="text" name="fecha" placeholder="Seleccione una fecha" style="cursor: pointer; background-color: white;"  required="" readonly=""   /></label>
  			</div>

  			<div class="form-group"> 
  			<button class="btn btn-success" style="margin-bottom:65px;">Buscar</button>
  			</div>
  			<div class="form-group"> 
  			<p  class="bg-info">El sistema traera todos los ensayos realizados correspondientes a 7 dias.</p>
  			</div>
  			
  			</form>

  		</div>

  			<div class="col-md-12">
      <div class="col-md-5">
        <form class="form-inline" >
        <input name="_token" type="hidden" value="{!! csrf_token() !!}" />
        <label>Mes de carga<input required  class="form-control" type="text" name="Parametro" placeholder="Digite un mes" /></label><button class="btn btn-success" style="margin-bottom:65px;">Buscar</button>
          </form>
       </div>


       <div class="col-md-5 pull-right">
        <form class="form-inline" >
         <input name="_token" type="hidden" value="{!! csrf_token() !!}" />
        <label>Rango de fecha:<input  type="text" name="Parametro"   style="cursor: pointer; background-color: white; margin-bottom:5px"  required="" readonly=""  type="Text" class="form-control  datepicker"  placeholder="Desde" >

          <input  type="text" name="Parametro"   style="cursor: pointer; background-color: white;"  required="" readonly=""  type="Text" class="form-control  datepicker"  placeholder="Hasta" >

        </label><button class="btn btn-success " >Buscar</button>
        </form>

      </div>
     </div>	
     

  </div>

  </div>
    
</div> {{--Modal busqueda de falla--}}







{{--Modal Llenado de datos--}}

<div class="remodal" data-remodal-id="llenardatos_modal">
  <button data-remodal-action="close" class="remodal-close"></button>
  <h3 class="bg-success">Datos Requeridos&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Resultados</h3>
  <br>
  
  <div class="row">
  	<div class="col-md-6">
  				
  		 <div class="form-horizontal" >
		  	
		  	<form  method="post" action="/pc/falla7">
		  		<input name="_token" type="hidden" value="{!! csrf_token() !!}" />

		  	
		   <div class="form-group">
		    <label  class="col-sm-6 control-label">Fecha Falla:</label>
		    <div class="col-sm-6">
		      <input required name="Fecha_Falla" id="Fecha_Falla" style="cursor: pointer; background-color: white;"    type="text" class="form-control datepicker"  >
		    </div>
		  </div>

		    <div class="form-group">
		    <label for="inputEmail3" class="col-sm-6 control-label">Lugar Falla:</label>
		    <div class="col-sm-6">
		      <input name="Lugar_Falla" required  type="Text" class="form-control "  placeholder="Lugar de la falla">
		    </div>
		  </div>

		  
		   <div class="form-group">
		    <label for="inputEmail3" class="col-sm-6 control-label">Falla 1 (kg/cm2)</label>
		    <div class="col-sm-6">
		      <input type="number" id="Falla1" name="Falla1" class="form-control"  placeholder="Digite falla 1">
		    </div>
		  </div>


		
		  
		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-6 control-label">Falla 2 (kg/cm2)</label>
		    <div class="col-sm-6">
		      <input type="number" required id="Falla2" name="Falla2" class="form-control"  placeholder="Digite falla 2">
		    </div>
		  </div>



		   <div class="form-group">
		    <label for="inputEmail3" required class="col-sm-6 control-label">Falla 3 (kg/cm2)</label>
		    <div class="col-sm-6">
		      <input type="number" id="Falla3"  name="Falla3" class="form-control"  placeholder="Digite falla 3"  >
		    </div>
		  </div>

		  	<div class="form-group">
		    <label  class="col-sm-6 control-label">Codigo Diseño:</label>
		    <div class="col-sm-6">
		      <input name="Codigo_Diseño" readonly="" id="Codigo_Diseño" type="text" class="form-control"  >
		    </div>
		  </div>

		  
		   <div class="form-group">
		    <label  class="col-sm-6 control-label">Nombre Proyecto:</label>
		    <div class="col-sm-6">
		      <input  name="Nombre_Proyecto" readonly="" id="Nombre_Proyecto"  class="form-control"  >
		    </div>
		  </div>

		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-6 control-label">Nombre Elemento</label>
		    <div class="col-sm-6">
		      <input type="text" class="form-control" readonly="" id="Nombre_Elemento" name="Nombre_Elemento" >
		    </div>
		   </div>


		  
		 
		  <div class="form-group">
		       
		        <div class="col-sm-offset-6 col-sm-6">
		        <button type="button"  class="btn btn-info calculodatos">Calcular</button>
		         
		        </div>
		  </div>
		</div>


     </div>


       <div class="col-md-6">
  		
		  <div class="form-horizontal"  >
		  		
		  	<div class="form-group">
		    <label  class="col-sm-6 control-label">Fecha Moldeo:</label>
		    <div class="col-sm-6">
		      <input  name="Fecha_Moldeo" readonly=""  id="Fecha_Moldeo"   type="text" class="form-control"  >
		    </div>
		  </div>	

		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-6 control-label">Numero Dias</label>
		    <div class="col-sm-6">
		      <input type="number" required class="form-control" readonly="" id="Numero_Dias" name="Numero_Dias"  >
		    </div>
		   </div>



		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-6 control-label">Resist. Nominal (kg/cm2):</label>
		    <div class="col-sm-6">
		      @if(isset($res_nominal))
		      <input type="number" class="form-control" id="Resis_Nominal" name="Resis_Nominal" readonly="" value="{{calcula_resnominal($res_nominal)}}">
		      @else
		      <input type="number" class="form-control" id="Resis_Nominal" name="Resis_Nominal" readonly="" value="0">
		      @endif


		    </div>
		   </div>

		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-6 control-label">Resist. Promedio (kg/cm2):</label>
		    <div class="col-sm-6">
		      <input name="Resis_Promedio"  id="Resis_Promedio" type="number" class="form-control"  readonly="" >
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="inputPassword3" class="col-sm-6 control-label">Resist. Porcentual (%):</label>
		    <div class="col-sm-6">
		      <input type="number" name="Resis_Porcentual" id="Resis_Porcentual" class="form-control" readonly="" >
		    </div>
		  </div>

		  <input id="numerocarga" type="hidden" name="Numero_Carga" value="ok">

		  <div class="form-group">
		       
		        <div class="col-sm-offset-6 col-sm-6">
		           <button type="submit" class="btn btn-success">Grabar</button>
		        </div>
		  </div>
		  
		</div>


       </div>

       </form>

</div>
</div>
{{--Modal Llenado de datos--}}



@endsection

@section('script')

<script type="text/javascript">
	
$(document).ready(function(){

  $(".llenardatos").click(function() {
      
       var codigo = $(this).data('codigo');
       var proyecto = $(this).data('proyecto');
       var elemento = $(this).data('elemento');
       var fechacarga = $(this).data('fechacarga');
       var numerocarga = $(this).data('numerocarga');
    

       

       $('#Codigo_Diseño').val(codigo);
       $('#Nombre_Proyecto').val(proyecto);
       $('#Nombre_Elemento').val(elemento);
       $('#Fecha_Moldeo').val(fechacarga);
       $('#numerocarga').val(numerocarga);

       


      });

   $(".calculodatos").click(function() {
      
      // Resistencia Promedio

      var falla1 = 0;
      var falla2 = 0;
      var falla3 = 0;
      var sumanumerador = 0;
      var sumadenominador= 0;
      
      falla1= $('#Falla1').val();
      falla2= $('#Falla2').val();
      falla3= $('#Falla3').val();

 	  sumanumerador = parseFloat(falla1) +parseFloat(falla2)+parseFloat(falla3);	
 	  
   	 if (falla1 > 0) { sumadenominador++; }
   	 if (falla2 > 0) { sumadenominador++; } 
     if (falla3 > 0) { sumadenominador++; }

     var promedio = (sumanumerador / sumadenominador);


   	  $('#Resis_Promedio').val( promedio.toFixed(2) );	
      

      //Dias transcurridos
       
       var dias = 0;
       var fecha1 = "";
       var fecha2 = "";

       fecha1 = $('#Fecha_Moldeo').val();
       fecha2 = $('#Fecha_Falla').val();


      dias = calculardias(fecha1 , fecha2);
      $('#Numero_Dias').val(dias);


      //Calculo resistencia porcentual

      var resisnominal = 0 ;
      var resispromedio = 0;
      var resisporcentual = 0;

      resisnominal = $('#Resis_Nominal'); 
      resispromedio = $('#Resis_Promedio'); 

      resisporcentual = (resisnominal/resispromedio)*100;

      $('#Resis_Porcentual').val(dias);


      });



   function calculardias(date1 , date2){

   if (date1.indexOf("-") != -1) { date1 = date1.split("-"); } else if (date1.indexOf("/") != -1) { date1 = date1.split("/"); } else { return 0; }   if (date2.indexOf("-") != -1) { date2 = date2.split("-"); } else if (date2.indexOf("/") != -1) { date2 = date2.split("/"); } else { return 0; }   if (parseInt(date1[0], 10) >= 1000) {       var sDate = new Date(date1[0]+"/"+date1[1]+"/"+date1[2]);   } else if (parseInt(date1[2], 10) >= 1000) {       var sDate = new Date(date1[2]+"/"+date1[1]+"/"+date1[0]);   } else {       return 0;   }   if (parseInt(date2[0], 10) >= 1000) {       var eDate = new Date(date2[0]+"/"+date2[1]+"/"+date2[2]);   } else if (parseInt(date2[2], 10) >= 1000) {       var eDate = new Date(date2[2]+"/"+date2[1]+"/"+date2[0]);   } else {       return 0;   }   var one_day = 1000*60*60*24;   var daysApart = Math.abs(Math.ceil((sDate.getTime()-eDate.getTime())/one_day));   return daysApart;


   }




    });


</script>



@endsection
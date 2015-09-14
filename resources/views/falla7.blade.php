@extends('app')

@section('content')

<div class="container">
	<div class="row">
	<div class="col-md-12" style="margin-bottom:20px">
	<button class="btn btn-success" data-remodal-target="buscarmixer_modal" >Buscar ensayo</button>
	<button class="btn btn-success" data-remodal-target="buscarhistorial_modal" >Buscar Historial</button>
	<input class="btn btn-info pull-right" style="background-color: #32C0AC;" type="button" value="Imprimir" onClick="window.print()">
	</div>
	

		<div class="col-md-12 ">
			<div class="panel panel-default">
				<div class="panel-heading text-center"> <b>{{$titlemesage}}</b> </div>
				<div class="panel-body">
				
				<div class="row">
				<div class="col-md-12  ">
			@if(isset($carga) )
				@if(!is_null($carga) & count($carga) > 0  )
				<table class="table table-bordered tablePag" >
 				
				   <thead class="bg-success">
				      <tr>
				        <td>Acción</td>
				        <td>Numero Carga</td>
				        <td>Nombre Proyecto</td>
				        <td>Codigo Proyecto</td>
				        <td>Nombre Elemento</td>
				        <td>Codigo Elemento</td>
				        <td>Fecha Ensayo</td>
				      </tr>
				     </thead>	


				
				     <tbody>

				       

				     @foreach($carga as $mix)
				     	<tr>
				     	
				     	

					 	<td><button data-fechacarga="{{$mix->Fecha_de_Carga}}" data-codigo="{{$mix->Codigo_Diseño}}" data-proyecto="{{$mix->Nombre_Proyecto}}" data-elemento="{{$mix->Nombre_Elemento}}"  class="btn btn-success llenardatos" data-numerocarga="{{$mix->Numero_Carga}}" data-remodal-target="llenardatos_modal" >Seleccionar</button></td>
				     	<td>{{$mix->Numero_Carga}}</td>
				     	<td>{{$mix->Nombre_Proyecto}}</td>
				     	<td>{{$mix->Codigo_Proyecto}}</td>
				     	<td>{{$mix->Nombre_Elemento}}</td>
				     	<td>{{$mix->Codigo_Elemento}}</td>
				     	<td>{{$mix->Fecha_Ensayo}}</td>
				     	
				     </tr>

				     @endforeach
				

				     </tbody>

				</table>

				@else
				
				<p class="bg-danger text-center" style="height:40px;padding-top:10px"><b>Datos no encontrados . Por favor realize una nueva busqueda.</b></p>
				
				@endif
				
				@else
			<p class="bg-info text-center" style="height:40px;padding-top:10px"><b>Por favor realize una busqueda</b></p>		
			
          @endif

				</div>
				
				
			

				</div>
				
				</div>
			</div>
		</div>
	</div>
</div>{{--End Container--}}

{{--Modal busqueda Ensayo--}}
<div class="remodal" data-remodal-id="buscarmixer_modal">
  <button data-remodal-action="close" class="remodal-close"></button>
  <h3>Seleccione una fecha</h3>
  <br>
  

  <div class="row">
  <div class="col-md-12">
  		<div class="col-md-12">
  			<form class="form-horizontal" method="post" action="/pc/falla7/fecha">
  			<input name="_token" type="hidden" value="{!! csrf_token() !!}" />
  			
  			<div class="form-group"> 
  			<label>Fecha <input  class="form-control datepicker" type="text" name="fecha" placeholder="Seleccione una fecha" style="cursor: pointer; background-color: white;"  required="" readonly=""   /></label>
  			</div>

  			<div class="form-group"> 
  			<button class="btn btn-success" style="margin-bottom:65px;">Buscar</button>
  			</div>
  			<div class="form-group"> 
  			<p>El sistema traera todos los ensayos correspondientes a 7 dias atras.</p>
  			</div>
  			
  			</form>

  		</div>

  </div>

  </div>
    
</div> {{--Modal busqueda de ensayo--}}



{{--Modal busqueda de historial--}}
<div class="remodal" data-remodal-id="buscarhistorial_modal">
 <button data-remodal-action="close" class="remodal-close"></button>
 <h4 >Seleccione un medio de busqueda </h4>
  <br>
  

  <div class="row">
  <div class="col-md-12">
  		<div class="col-md-6">
  			<form class="form-horizontal" method="post" action="/pc/falla7/carga/historial">
  			<input name="_token" type="hidden" value="{!! csrf_token() !!}" />
  			<div class="form-group">
  			<label>Numero de carga <input required=""  class="form-control " type="text" name="carga" placeholder="Numero de carga" /></label>
  			</div>
  			
  			<div class="form-group">
  			<button type="submit" class="btn btn-success" >Buscar</button>
  			</div>
  			
  			</form>
  			
  		</div>


  		<div class="col-md-6">
  			<form class="form-horizontal" method="post" action="/pc/falla7/fecha/historial">
  			<input name="_token" type="hidden" value="{!! csrf_token() !!}" />
  			<div class="form-group">
  			<label>Fecha de ensayo <input required="" class="form-control fechaingresada datepicker" type="text" name="fecha" placeholder="Seleccione una fecha" style="cursor: pointer; background-color: white;"  required="" readonly=""  /></label>
  		   </div>

  		   <div class="form-group">
           <button type="submit" class="btn btn-success" >Buscar</button>
           </div>
  			</form>
  			
  		</div>
  </div>	

  	<div class="col-md-12">
     
       
        <form class="form-horizontal" method="post" action="/pc/falla7/rango/historial">
         <input name="_token" type="hidden" value="{!! csrf_token() !!}" />
        <label>Rango de fecha:<input  type="text" name="Desde"   style="cursor: pointer; background-color: white; margin-bottom:5px"  required="" readonly=""  type="Text" class="form-control  datepicker"  placeholder="Desde" >

          <input  type="text" name="Hasta"   style="cursor: pointer; background-color: white;"  required="" readonly=""  type="Text" class="form-control  datepicker"  placeholder="Hasta" >

        </label>
        <div class="form-group">
        <button class="btn btn-success " >Buscar</button>
       </div>
        
        </form>

     
    </div>
    
<div class="form-group"> 
  			<p>El sistema traera los ensayos en falla 7 realizados.</p>
  			</div>	
  </div>

 
</div> {{--Modal busqueda de historial--}}




{{--Modal Llenado de datos--}}
@if(isset($carga))
<div class="remodal" data-remodal-id="llenardatos_modal">
  <button data-remodal-action="close" class="remodal-close"></button>
  <h3 >Realizar Ensayo</h3>
  <br>
  
  <div class="row">
  	<div class="col-md-6">
  				
  		 <div class="form-horizontal" >
		  	
		  	<form  method="post" action="/pc/falla7">
		  		<input name="_token" type="hidden" value="{!! csrf_token() !!}" />

		  	
		    <div class="form-group">
		    <label for="inputEmail3" class="col-sm-6 control-label">Lugar Falla: </label>
		    <div class="col-sm-6">
		      <input name="Lugar_Falla" required  type="Text" class="form-control "  placeholder="Lugar de la falla">
		    </div>
		  </div>

		  
		   <div class="form-group">
		    <label for="inputEmail3" class="col-sm-6 control-label">Falla 1 (kg/cm2): </label>
		    <div class="col-sm-6">
		      <input type="number" id="Falla1" name="Falla1" class="form-control"  placeholder="Digite falla 1">
		    </div>
		  </div>


		
		  
		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-6 control-label">Falla 2 (kg/cm2): </label>
		    <div class="col-sm-6">
		      <input type="number" required id="Falla2" name="Falla2" class="form-control"  placeholder="Digite falla 2">
		    </div>
		  </div>



		   <div class="form-group">
		    <label for="inputEmail3" required class="col-sm-6 control-label">Falla 3 (kg/cm2): </label>
		    <div class="col-sm-6">
		      <input type="number" id="Falla3"  name="Falla3" class="form-control"  placeholder="Digite falla 3"  >
		    </div>
		  </div>

		  	<div class="form-group">
		    <label  class="col-sm-6 control-label">Codigo Diseño: </label>
		    <div class="col-sm-6">
		      <input name="Codigo_Diseño" readonly="" id="Codigo_Diseño" type="text" class="form-control"  >
		    </div>
		  </div>

		  
		   <div class="form-group">
		    <label  class="col-sm-6 control-label">Nombre Proyecto: </label>
		    <div class="col-sm-6">
		      <input  name="Nombre_Proyecto" readonly="" id="Nombre_Proyecto"  class="form-control"  >
		    </div>
		  </div>

		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-6 control-label">Nombre Elemento: </label>
		    <div class="col-sm-6">
		      <input type="text" class="form-control" readonly="" id="Nombre_Elemento" name="Nombre_Elemento" >
		    </div>
		   </div>

		     <div class="form-group">
        <label for="inputEmail3" class="col-sm-6 control-label">Encargado: </label>
        <div class="col-sm-6">
          
	          <select name="Encargado" class="form-control" >
	            @foreach($encargados as $encargado)
	            <option value="{{$encargado->nombre}}" > {{$encargado->nombre}} </option>
	            @endforeach
	          </select>


	        </div>
	      </div>
		  
		 
		  <div class="form-group">
		       
		        <div class="col-sm-offset-6 col-sm-6">
		        <button type="button"  class="btn btn-info calculodatos" style="background-color:green;">Calcular</button>
		         
		        </div>
		  </div>
		</div>


     </div>


       <div class="col-md-6">
  		
		  <div class="form-horizontal"  >
		  		
		  	<div class="form-group">
		    <label  class="col-sm-6 control-label">Fecha Carga:</label>
		    <div class="col-sm-6">
		      <input  name="Fecha_Ensayo" readonly=""  id="Fecha_Ensayo"   type="text" class="form-control"  >
		    </div>
		  </div>	

		  <?php date_default_timezone_set('America/Costa_Rica'); ?>
		   <div class="form-group">
		    <label  class="col-sm-6 control-label">Fecha Ensayo:</label>
		    <div class="col-sm-6">
		      <input name="Fecha_Registro" value="{{date( 'Y-m-d' )}}" readonly=""  id="Fecha_Registro" style=" background-color: white;" type="text" class="form-control"  >
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

		  <input id="numerocarga" type="hidden" name="Numero_Carga" value="">

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
@endif

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
       $('#Fecha_Ensayo').val(fechacarga);
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

       fecha1 = $('#Fecha_Registro').val();
       fecha2 = $('#Fecha_Ensayo').val();


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
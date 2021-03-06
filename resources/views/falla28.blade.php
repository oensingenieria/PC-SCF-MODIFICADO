@extends('app')

@section('content')

<div class="container">
	<div class="row">
	<div class="col-md-12" style="margin-bottom:20px">
	<button class="btn btn-success" data-remodal-target="buscarmixer_modal" >Buscar ensayo</button>
	<button class="btn btn-success" data-remodal-target="buscarhistorial_modal" >Buscar Historial</button>
	<input class="btn btn-info pull-right" style="background-color: #32C0AC;" type="button" value="Imprimir" onClick="window.print()">
	<button style="margin-right:20px" class="btn btn-info pull-right" data-remodal-target="infofalla28_modal" > <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span></button>
	</div>
	

		<div class="col-md-12 ">
			<div class="panel panel-default">
				<div class="panel-heading text-center"> <b>{{$titlemesage}}</b> </div>
				<div class="panel-body">
				
				<div class="row">
				<div class="col-md-12  ">
			@if(isset($carga) || isset($historial) )
				@if(!is_null($carga) & count($carga) > 0 || !is_null($historial) & count($historial) > 0 )
				<table class="table table-bordered tablePag" >
 				
				   <thead class="bg-success">
				       <tr>
				       <td>Acciones</td>
		                <td>Numero Carga</td>
		                <td>Codigo Diseño</td>
		                <td>Nombre Elemento</td>
		                <td>Fecha Ensayo</td>
		                <td>Falla 1</td>
		                <td>Falla 2</td>
		                <td>Falla 3</td>
		                <td>Resist. Nominal</td>
		                <td>Resist. Promedio</td>
		                <td>Resist. Porcentual</td>
		                <td>Encargado</td>
				      </tr>
				     </thead>	


				
				     <tbody>


				     @if(isset($historial))
                    @if( count($historial) > 0 )

                       @foreach($historial as $mix)
                       
                         <tr>
               
                            <td><button class="btn btn-info">{{$mix->Nombre_Cuenta}}</button></td>
                            <td>{{$mix->Numero_Carga}}</td>
                            <td>{{$mix->Codigo_Diseño}}</td>
                            <td>{{$mix->Nombre_Elemento}}</td>
                            <td>{{$mix->Fecha_Ensayo}}</td>
                            <td>{{$mix->Falla1}}</td>
                            <td>{{$mix->Falla2}}</td>
                            <td>{{$mix->Falla3}}</td>
                            <td>{{$mix->Resis_Nominal}}</td>
                            <td>{{$mix->Resis_Promedio}}</td>
                            <td>{{$mix->Resis_Porcentual}}</td>
                            <td style="color:blue">{{$mix->Encargado}}</td>
                      
                       </tr>


                       @endforeach


                      @endif

                   @endif 	
				       

				     @foreach($carga as $mix)
				     	<tr>
				     	
				     	

					 	<td><button data-fechacarga="{{$mix->Fecha_de_Carga}}" data-codigo="{{$mix->Codigo_Diseño}}" data-proyecto="{{$mix->Nombre_Proyecto}}" data-elemento="{{$mix->Nombre_Elemento}}"  class="btn btn-success llenardatos" data-numerocarga="{{$mix->Numero_Carga}}" data-remodal-target="llenardatos_modal" >Seleccionar</button></td>
				     	<td>{{$mix->Numero_Carga}}</td>
				     	<td>{{$mix->Codigo_Diseño}}</td>
				     	<td>{{$mix->Codigo_Elemento}}</td>
				     	<td>{{$mix->Fecha_Ensayo}}</td>
				     	<td></td>
				     	<td></td>
				     	<td></td>
				     	<td></td>
				     	<td></td>
				     	<td></td>
				     	<td></td>
				     	
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
  <h3 >Seleccione una fecha</h3>
  <br>
  

  <div class="row">
  <div class="col-md-12">
  		<div class="col-md-12">
  			<form class="form-horizontal" method="post" action="/pc/falla28/fecha">
  			<input name="_token" type="hidden" value="{!! csrf_token() !!}" />
  			
  			<div class="form-group"> 
  			<label>Fecha <input required=""  class="form-control datepicker" type="text" name="fecha" placeholder="Seleccione una fecha" style="cursor: pointer; background-color: white;"  required="" readonly=""   /></label>
  			</div>

  			<div class="form-group"> 
  			<button class="btn btn-success" style="margin-bottom:65px;">Buscar</button>
  			</div>
  			<div class="form-group"> 
  			<p >El sistema traera todos los ensayos correspondientes a 28 dias atras.</p>
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
  			<form class="form-horizontal" method="post" action="/pc/falla28/carga/historial">
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
  			<form class="form-horizontal" method="post" action="/pc/falla28/fecha/historial">
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
     
       
        <form class="form-horizontal" method="post" action="/pc/falla28/rango/historial">
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
  			<p >El sistema traera todos los ensayos correspondientes a 28 dias atras.</p>
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
		  	
		  	<form  method="post" action="/pc/falla28">
		  		<input name="_token" type="hidden" value="{!! csrf_token() !!}" />

		  	
		    <div class="form-group">
		    <label for="inputEmail3" class="col-sm-6 control-label">Lugar Falla: </label>
		    <div class="col-sm-6">
		      <input name="Lugar_Falla" required  type="Text" class="form-control "  placeholder="Lugar de la falla">
		    </div>
		  </div>

		  <div class="form-group">
        <label class="col-sm-6 control-label" >Fecha de Ensayo </label> 
        <div class="col-sm-6">
        <input  name="Fecha_Ensayo"   style="cursor: pointer; background-color: white;"  required="" readonly=""  type="Text" class="form-control  datepicker"  placeholder="Ingrese una fecha" >
        </div>
           </div> 

		  
		   <div class="form-group">
		    <label for="inputEmail3" class="col-sm-6 control-label">Falla 1 (kg/cm2): </label>
		    <div class="col-sm-6">
		      <input required type="number" id="Falla1" name="Falla1" class="form-control"  placeholder="Digite falla 1">
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
		      <input required type="number" id="Falla3"  name="Falla3" class="form-control"  placeholder="Digite falla 3"  >
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
		        <button type="button"  class="btn btn-info calculodatos">Calcular</button>
		         
		        </div>
		  </div>
		</div>


     </div>


       <div class="col-md-6">
  		
		  <div class="form-horizontal"  >
		  		
		  	<div class="form-group">
		    <label  class="col-sm-6 control-label">Fecha Carga:</label>
		    <div class="col-sm-6">
		      <input  name="Fecha_Carga" readonly=""  id="Fecha_Ensayo"   type="text" class="form-control"  >
		    </div>
		  </div>	

		  <?php date_default_timezone_set('America/Costa_Rica'); ?>
		   <div class="form-group">
		    <label  class="col-sm-6 control-label">Fecha Registro:</label>
		    <div class="col-sm-6">
		      <input name="Fecha_Registro" value="{{date( 'Y-m-d' )}}" readonly=""  id="Fecha_Registro" style=" background-color: white;" type="text" class="form-control"  >
		    </div>
		  </div>

		  	<div class="form-group">
		    <label  class="col-sm-6 control-label">Codigo Diseño: </label>
		    <div class="col-sm-6">
		      <input name="Codigo_Diseño" readonly="" id="Codigo_Diseño" type="text" class="form-control"  >
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

{{--Modal Info--}}
<div class="remodal" data-remodal-id="infofalla28_modal">
  <button data-remodal-action="close" class="remodal-close"></button>
  <h3 >Funcionamiento</h3>
  <br>
  
  <div class="row">
  <div class="col-md-12">
    <p class="text-justify">Falla 28 necesita de los permisos respectivos para acceder a los registros que encuentren disponibles , su filtro es ha 28 días atrás de la fecha en la que se ensayo con un alcance máximo de 5 días .
    </p>  
    <br>
    <p class="text-justify">Al momento de ingresar los datos del registro el usuario dispone de la opción calcular la cual determina el numero de días existentes entre la fecha de carga y la fecha de ensayo , calcula la resistencia nominal y la resistencia porcentual así como la resistencia promedio que depende de los datos en las fallas.
   </p> 
   
 
  </div>

  </div>
    
</div> {{--Modal info--}}

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
      var resispromedio = 0 ;
      var resisporcentual = 0 ;
      
      resisnominal= $('#Resis_Nominal').val();
      resispromedio= $('#Resis_Promedio').val();

      if(resisnominal != 0){ 
      resisporcentual = (resispromedio / resisnominal) * 100 ;
      }

      $('#Resis_Porcentual').val(resisporcentual.toFixed(2));
      });



   function calculardias(date1 , date2){

   if (date1.indexOf("-") != -1) { date1 = date1.split("-"); } else if (date1.indexOf("/") != -1) { date1 = date1.split("/"); } else { return 0; }   if (date2.indexOf("-") != -1) { date2 = date2.split("-"); } else if (date2.indexOf("/") != -1) { date2 = date2.split("/"); } else { return 0; }   if (parseInt(date1[0], 10) >= 1000) {       var sDate = new Date(date1[0]+"/"+date1[1]+"/"+date1[2]);   } else if (parseInt(date1[2], 10) >= 1000) {       var sDate = new Date(date1[2]+"/"+date1[1]+"/"+date1[0]);   } else {       return 0;   }   if (parseInt(date2[0], 10) >= 1000) {       var eDate = new Date(date2[0]+"/"+date2[1]+"/"+date2[2]);   } else if (parseInt(date2[2], 10) >= 1000) {       var eDate = new Date(date2[2]+"/"+date2[1]+"/"+date2[0]);   } else {       return 0;   }   var one_day = 1000*60*60*24;   var daysApart = Math.abs(Math.ceil((sDate.getTime()-eDate.getTime())/one_day));   return daysApart;


   }




    });


</script>



@endsection
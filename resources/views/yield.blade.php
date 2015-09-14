@extends('app')

@section('content')

<div class="container">
	<div class="row">
		
		<div class="col-md-12">
			
		<div style="margin-bottom:20px">
		<button class="btn btn-success" data-remodal-target="buscarensayo_modal" >Buscar ensayo</button>
	    <button class="btn btn-success" data-remodal-target="buscarhistorial_modal" >Buscar historial</button>
		
		<input class="btn btn-info pull-right" style="background-color: #32C0AC;" type="button" value="Imprimir" onClick="window.print()">
        
        </div>
				

			<div class="panel panel-default">
				<div class="panel-heading text-center"><b>{{$titlemesage}}</b></div>
				<div class="panel-body">
				
				<div class="row">
				<div class="col-md-12" >
				
				@if(!isset($carga))
				 	@if(isset($bad))
				 	<p class="bg-danger text-center" style="height:40px;padding-top:10px"><b>Datos no encontrados . Por favor realize una nueva busqueda.</b></p>
				 	@else
					<p class="bg-info text-center" style="height:40px;padding-top:10px"><b>Por favor realize una busqueda</b></p>

					@endif
				@endif

				</div>
				
				@if(isset($carga))
				 @if(!is_null($carga))
				<div class="row">
				<div class="col-md-12  ">
				 <table class="table table-bordered tablePag">
 				
				   <thead class="bg-success " class="bg-success ">
				      <tr>
				        <td>Acciones</td>
				        <td>Numero de carga</td>
				        <td>Fecha de Ensayo</td>
				        <td>Numero de boleta</td>
				        <td>Nombre del elemento</td>
				        <td>Codigo de diseño</td>
				     
				      </tr>
				     </thead>

				     
				     <tr>
				     	
					 	<td>

					 	<button  data-remodal-target="llenadata_modal" class="btn btn-success llenardatos" data-fecha="{{$carga->Fecha_de_Carga}}" data-codigo="{{$carga->Codigo_Diseño}}" data-volumen="{{$carga->Volumen_de_Carga}}" data-numcarga="{{$carga->Numero_Carga}}" >Realizar</button>

						
					 	</td>	
				     	<td>{{$carga->Numero_Carga}}</td>
				     	<td>{{$carga->Fecha_de_Carga}}</td>
				     	<td>{{$carga->Boleta_Batida}}</td>
                        <td>{{$carga->Nombre_Proyecto}}</td>
				     	<td>{{$carga->Codigo_Diseño}}</td>
				     	
				     	</tr>
				     
				     <tbody>
				     	


				     </tbody>


				</table>
		
				  
				  @endif  
				@endif

				</div>
				</div>
				
				</div>

				</div>
				
			</div>
		</div>
	</div>
</div>



{{--Modal busqueda de Ensayo--}}
<div class="remodal" data-remodal-id="buscarensayo_modal">
 <button data-remodal-action="close" class="remodal-close"></button>
 <h4 >Buscar un Ensayo </h4>
  <br>
  

  <div class="row">
  <div class="col-md-12" >
  		
  			<form class="form-horizontal" method="post" action="/pc/yield/ensayo/carga">
  			<input name="_token" type="hidden" value="{!! csrf_token() !!}" />
  			<label>Numero de carga <input required=""  class="form-control " type="text" name="carga" placeholder="Numero de carga" /></label>		
  	
  </div>

 <div class="col-md-12" >
  			<button type="submit" class="btn btn-success" >Buscar</button>
  			</form>	

 </div>

  </div>

 
</div> 
{{--Modal busqueda de ensayo--}}



{{--Modal busqueda de historial--}}
<div class="remodal" data-remodal-id="buscarhistorial_modal">
 <button data-remodal-action="close" class="remodal-close"></button>
 <h4 >Seleccione un medio de busqueda </h4>
  <br>
  

  <div class="row">
  <div class="col-md-12">
  		<div class="col-md-6">
  			<form class="form-horizontal" method="post" action="/pc/yield/carga">
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
  			<form class="form-horizontal" method="post" action="/pc/yield/fecha">
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
     
       
        <form class="form-horizontal" method="post" action="/pc/yield/rango">
         <input name="_token" type="hidden" value="{!! csrf_token() !!}" />
        <label>Rango de fecha:<input  type="text" name="Desde"   style="cursor: pointer; background-color: white; margin-bottom:5px"  required="" readonly=""  type="Text" class="form-control  datepicker"  placeholder="Desde" >

          <input  type="text" name="Hasta"   style="cursor: pointer; background-color: white;"  required="" readonly=""  type="Text" class="form-control  datepicker"  placeholder="Hasta" >

        </label>
        <div class="form-group">
        <button class="btn btn-success " >Buscar</button>
       </div>
        
        </form>

     
    </div>	

  </div>

 
</div> {{--Modal busqueda de historial--}}


{{--Modal Llenado de datos--}}

@if(isset($carga))

<div class="remodal" data-remodal-id="llenadata_modal">
  <button data-remodal-action="close" class="remodal-close"></button>
  <h4 ><b>Realizar Ensayo</b></h4>
  <br>
  
  <div class="row">
  		
  		<form class="form-horizontal" method="post" action="/pc/yield/crear">
		<input name="_token" type="hidden" value="{!! csrf_token() !!}" />

	<div class="col-md-6"> 

		   <div class="form-group">
		    <label  class="col-sm-6 control-label">Fecha de Carga:</label>
		    <div class="col-sm-6">
		      <input  value="" name="Fecha_Ensayo"  readonly="" type="text" class="form-control Fecha_de_Carga resetinput"  >
		    </div>
		  </div>

		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-6 control-label">Codigo de Diseño:</label>
		    <div class="col-sm-6">
		      <input  type="text" class="form-control resetinput" name="Codigo" id="Codigo_Diseño" readonly="" value="" placeholder="Elemento">
		    </div>
		   </div>
		 
		   	 <?php date_default_timezone_set('America/Costa_Rica'); ?>

		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-6 control-label">Fecha de Ensayo:</label>
		    <div class="col-sm-6">
		      <input value="{{date ( 'Y-m-d' )}}"  class="form-control " type="text" name="Fecha_Registro" placeholder="Seleccione una fecha" style="cursor: pointer; background-color: white; "  required="" readonly=""   />
		    </div>
		   </div>

		    <div class="form-group">
		    <label for="inputEmail3" class="col-sm-6 control-label">Hora de Ensayo:</label>
		    <div class="col-sm-6">
		      <input required="" type="text" class="form-control timepicker" name="Hora_Registro"  value="" placeholder="Hora">
		    </div>
		   </div>

		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-6 control-label">Molde:</label>
		    <div class="col-sm-6">
		        <select class="form-control selectmolde" name="Molde" >
				  <option value="No asignado">No seleccionado</option>
				  @foreach($molde as $m)
				  <option data-peso="{{$m->Peso_Molde}}" data-volumen="{{$m->Volumen_Molde}}" value="{{$m->Nombre_Molde}}">{{$m->Nombre_Molde}}</option>
				  @endforeach
				  
				</select>

		    </div>
		  </div>

		 
		   <div class="form-group">
		    <label for="inputPassword3" class="col-sm-6 control-label">Peso del molde (kg):</label>
		    <div class="col-sm-6">
		      <input  type="text" name="Peso_Molde" required="" readonly="" class="form-control pesomolde resetinput" placeholder="Peso">
		    </div>
		  </div>

		  <div class="form-group">
		    <label for="inputPassword3" class="col-sm-6 control-label">Volumen del molde (m3):</label>
		    <div class="col-sm-6">
		      <input  type="text" readonly="" required=""  name="Volumen_Molde" class="form-control volumenmolde resetinput"  placeholder="volumen">
		    </div>
		  </div>

		  <div class="form-group">
        <label for="inputEmail3" class="col-sm-6 control-label">Encargado:</label>
        <div class="col-sm-6">
          
	          <select name="Encargado" class="form-control" >
	            @foreach($encargados as $encargado)
	            <option value="{{$encargado->nombre}}" > {{$encargado->nombre}} </option>
	            @endforeach
	          </select>


	        </div>
	      </div>

	</div>

	<div class="col-md-6"> 
		  
		  <?php $agregado_sumado = 0;  ?>
		 
		 @foreach($agregado as $a)
		 <?php $agregado_sumado  = ((int)$agregado_sumado  + (int)$a->Cantidad_Total) ?>

		 @endforeach

		  
		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-6 control-label">Agregado (kg):</label>
		    <div class="col-sm-6">
		      <input  type="text" value="{{$agregado_sumado }}" readonly="" name="Agregado" class="form-control resetinput" placeholder="Agregado">
		    </div>
		  </div>

		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-6 control-label">Cemento (kg):</label>
		    <div class="col-sm-6">
		      <input  type="text" value="{{$cemento->Cantidad_Total}}" readonly="" id="Cemento" name="Cemento" class="form-control resetinput"  placeholder="CM">
		    </div>
		  </div>

		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-6 control-label">Aditivo (tls):</label>
		    <div class="col-sm-6">

		    <?php $Aditivo_formateado = number_format((float)($aditivo->Cantidad_Total /1000), 2, '.', ''); ?>

		      <input  type="number" step="0.01" readonly="" value="{{$Aditivo_formateado}}" name="Aditivo1" class="form-control resetinput"  placeholder="Aditivo">
		    </div>
		  </div>

		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-6 control-label">Aditivo2 (lts):</label>
		    <div class="col-sm-6">
		      <input required="" type="number" step="0.01"  name="Aditivo2" class="form-control"  placeholder="Aditivo 2">
		    </div>
		  </div>


		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-6 control-label">Agua (lts):</label>
		    <div class="col-sm-6">
		      <input  type="text" readonly="" value="{{$agua->Cantidad_Total}}" name="Agua" class="form-control resetinput"  placeholder="Agua">
		    </div>
		  </div>

		   <div class="form-group">
		    <label  class="col-sm-6 control-label">Yield (kg):</label>
		    <div class="col-sm-6">
		      <input required="" type="number" step="0.01" name="Yield" class="form-control "   placeholder="Yield">
		    </div>
		  </div>

		   <div class="form-group">
		    <label for="inputEmail3" class="col-sm-6 control-label">Volumen Teórico:</label>
		    <div class="col-sm-6">
		      <input  type="text" readonly="" name="Volumen_Teorico" id="Volumen_de_Carga" class="form-control resetinput"  >
		    </div>
		  </div>
		  
		 <input type="hidden" readonly="" name="Numero_Carga" id="Numero_Carga" class="form-control"  >
		  
		  <div class="form-group">
		    <div class="col-sm-offset-6 col-sm-6">
		     
		      <button type="submit" class="btn btn-success">Almacenar:</button>
		      
		    </div>
		  </div>

	</div>	  

	<input type="hidden" id="fechaensayo">

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
      
       var fecha = $(this).data('fecha');
       var cod_diseño = $(this).data('codigo');
       var volumen = $(this).data('volumen');
       var cemento = $(this).data('cemento');
       var numcarga = $(this).data('numcarga');
       

      


       $('.Fecha_de_Carga').val(fecha);
       $('#Codigo_Diseño').val(cod_diseño);
       $('#Volumen_de_Carga').val(volumen);
       $('#Numero_Carga').val(numcarga);
       


      });

  

  $(".selectmolde").change(function(){
    
  	var peso = $(this).find(':selected').data('peso');
  	var volumen = $(this).find(':selected').data('volumen');

  	 $('.pesomolde').val(peso);
     $('.volumenmolde').val(volumen);


});


    });


</script>

@endsection
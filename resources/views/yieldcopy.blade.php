@extends('app')



@section('content')

<?php
//Verifican la exitencia yield





?>



<div class="container">
	<div class="row">
		
	
		

		<div class="col-md-12">
			
		<div style="margin-bottom:20px">
		<button class="btn btn-success" data-remodal-target="buscarensayo_modal" >Buscar ensayo</button>
			<button class="btn btn-success" data-remodal-target="buscarhistorial_modal" >Buscar historial</button>
		<button class="btn btn-success" data-remodal-target="molde_modal" >Agregar Molde</button>
		<input class="btn btn-info pull-right" style="background-color: #32C0AC;" type="button" value="Imprimir" onClick="window.print()">
        
        </div>
				

			<div class="panel panel-default">
				<div class="panel-heading text-center"><b>YIELD</b></div>
				<div class="panel-body">
				
				<div class="row">
				<div class="col-md-12" >
				
				@if(!isset($carga) || $carga == null)
				<p class="bg-info text-center" style="height:40px;padding-top:10px">Por favor realize una busqueda</p>
				@endif

				</div>
				
			  @if(isset($carga))
				<div class="row">
				<div class="col-md-12  ">
				 <table class="table table-bordered">
 				
				   <thead>
				      <tr>
				        <td>Acciones</td>
				        <td>Numero de carga</td>
				        <td>Fecha de ensayo</td>
				        <td>Numero de boleta</td>
				        <td>Nombre del elemento</td>
				        <td>Codigo de diseño</td>
				     
				      </tr>
				     </thead>
                     
                     <tbody>
				 @foreach($carga as $carga)
				    
				     <tr>
				     	
					 	<td>

					 

					 	@if(is_null($yield))	

					 	<button  data-remodal-target="llenadata_modal" class="btn btn-success llenardatos" data-fecha="{{$carga->Fecha_de_Carga}}" data-codigo="{{$carga->Codigo_Diseño}}" data-volumen="{{$carga->Volumen_de_Carga}}" >Llenar Ensayo</button>

						@else
						<button  class="btn btn-info "  >Ensayo realizado</button>

					 	@endif

					 	</td>	
				     	<td>{{$carga->Numero_Carga}}</td>
				     	<td>{{$carga->Fecha_de_Carga}}</td>
				     	<td>{{$carga->Boleta_Batida}}</td>
                        <td>{{$carga->Nombre_Proyecto}}</td>
				     	<td>{{$carga->Codigo_Diseño}}</td>
				     	
				     	</tr>
				    
				     @endforeach
				     
				     </tbody>


				</table>
		
				    
				@endif

				</div>
				</div>
				
				</div>
@if( isset($yield) )
	@if( $yield != null )			
	<div class="row">
		<div class="col-md-12">
			
		<div class="col-md-4" >
			<div class="bg-primary" style="border-radius: 4px;
            padding: 5px 5px 5px 5px;">
			<p class="text-center">Densidad Real (kg/m3)</p> 
			
			<p class="text-center"><b>
				
			<?php 
			$yield_dato = $yield->Yield;
			$peso_molde = $yield->Peso_Molde;
			$volumen_molde = $yield->Volumen_Molde;

		    $densidad_real = ($yield_dato - $peso_molde)/$volumen_molde;

		    print(number_format((float)$densidad_real, 2, '.', ''));
			 ?>

			</b></p>

			</div>
         </div>

         <div class="col-md-4" >
			<div class="bg-primary" style="border-radius: 4px;
            padding: 5px 5px 5px 5px;">
			<p class="text-center">Volumen Real (m3)</p> 
			<p class="text-center"><b>
				
			<?php 

			$agregado_dato = $yield->Agregado;
			$cemento_dato = $yield->Cemento;
			$aditivo1_dato =$yield->Aditivo1;
			$aditivo2_dato = $yield->Aditivo2;
			$agua_dato = $yield->Agua;

			$volumen_real = ($agregado_dato+$cemento_dato+$aditivo1_dato+$aditivo2_dato+$agua_dato) / $densidad_real;

		    print(number_format((float)$volumen_real, 2, '.', ''));
			 
			 ?>	


			</b></p>

			</div>
         </div>

         <div class="col-md-4" >
			<div class="bg-primary" style="border-radius: 4px;
            padding: 5px 5px 5px 5px;">
			<p class="text-center">Rendimiento Real (%)</p> 
			<p class="text-center"><b>
				
			<?php 

			 $volumen_mixer = $carga->Volumen_de_Carga;

			 $Rendimiento_real =  100 * ($volumen_mixer/$volumen_real);

			 print(number_format((float)$Rendimiento_real, 2, '.', ''));

			 ?>



			</b></p>

			</div>
         </div>

		</div>

	</div>	

	<div class="row" style="margin-top:40px;">
		
	<div class="col-md-12">
		
	<p class="text:muted" >El sistema ha realizado los calculos con los siguientes datos.</p>	
	<div class="col-md-4">

     <label>Yield (s) : &nbsp;&nbsp; <strong>{{$yield->Yield}}</strong></label><br>
     <label>Peso del Molde (kg) : &nbsp;&nbsp; <strong>{{$yield->Peso_Molde}}</strong></label><br>
     <label>Volumen del molde (m3) : &nbsp;&nbsp; <strong>{{$yield->Volumen_Molde}}</strong></label><br>
     <label>Volumen de carga (m3) : &nbsp;&nbsp; <strong>{{$carga->Volumen_de_Carga}}</strong></label><br>
     <label>Fecha de ensayo : &nbsp;&nbsp; <strong>{{$yield->Fecha_Ensayo}}</strong></label><br>

	</div>

	<div class="col-md-4">

     <label>Agregado (kg): &nbsp;&nbsp; <strong>{{$yield->Agregado}}</strong></label><br>
     <label>Cemento (kg) : &nbsp;&nbsp; <strong>{{$yield->Cemento}}</strong></label><br>
     <label>Aditivo 1 (lts) : &nbsp;&nbsp; <strong>{{$yield->Aditivo1}}</strong></label><br>
     <label>Aditivo 2 (lts) : &nbsp;&nbsp; <strong>{{$yield->Aditivo2}}</strong></label><br>
     <label>Agua (lts) : &nbsp;&nbsp; <strong>{{$yield->Agua}}</strong></label><br>

	</div>

	<div class="col-md-4">

     
     
	</div>
	</div>


	</div>

     
     @endif

@endif

				</div>
				
			</div>
		</div>
	</div>
</div>
</div>
</div>


{{--Modal busqueda de historial--}}
<div class="remodal" data-remodal-id="buscarhistorial_modal">
 <button data-remodal-action="close" class="remodal-close"></button>
 <h4 class="bg-success">Seleccione un medio de busqueda </h4>
  <br>
  

  <div class="row">
  <div class="col-md-12" style="margin-bottom:30px;">
  		<div class="col-md-6">
  			<form class="form-inline" method="post" action="/pc/yield/carga">
  			<input name="_token" type="hidden" value="{!! csrf_token() !!}" />
  			<label>Numero de carga <input required=""  class="form-control " type="text" name="carga" placeholder="Numero de carga" /></label>
  			<button type="submit" class="btn btn-success" >Buscar</button>
  			</form>
  			
  		</div>


  		<div class="col-md-6">
  			<form class="form-inline" method="post" action="/pc/yield/fecha">
  			<input name="_token" type="hidden" value="{!! csrf_token() !!}" />
  			<label>Fecha de ensayo <input required="" class="form-control fechaingresada datepicker" type="text" name="fecha" placeholder="Seleccione una fecha" style="cursor: pointer; background-color: white;"  required="" readonly=""  /></label>
           <button type="submit" class="btn btn-success" >Buscar</button>
  			</form>
  			
  		</div>
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

 
</div> {{--Modal busqueda de historial--}}



{{--Modal busqueda de Ensayo--}}
<div class="remodal" data-remodal-id="buscarensayo_modal">
 <button data-remodal-action="close" class="remodal-close"></button>
 <h4 class="bg-success">Seleccione un medio de busqueda </h4>
  <br>
  

  <div class="row">
  <div class="col-md-12" style="margin-bottom:30px;">
  		<div class="col-md-6">
  			<form class="form-inline" method="post" action="/pc/yield/ensayo/carga">
  			<input name="_token" type="hidden" value="{!! csrf_token() !!}" />
  			<label>Numero de carga <input required=""  class="form-control " type="text" name="carga" placeholder="Numero de carga" /></label>
  			<button type="submit" class="btn btn-success" >Buscar</button>
  			</form>
  			
  		</div>


  		<div class="col-md-6">
  			<form class="form-inline" method="post" action="/pc/yield/fecha">
  			<input name="_token" type="hidden" value="{!! csrf_token() !!}" />
  			<label>Fecha de ensayo <input required="" class="form-control fechaingresada datepicker" type="text" name="fecha" placeholder="Seleccione una fecha" style="cursor: pointer; background-color: white;"  required="" readonly=""  /></label>
           <button type="submit" class="btn btn-success" >Buscar</button>
  			</form>
  			
  		</div>
  </div>	

  	<div class="col-md-12">
  		<div class="col-md-6">
  			<form class="form-inline" method="post" action="/pc/yield/ensayo/boleta">
  			<input name="_token" type="hidden" value="{!! csrf_token() !!}" />
  			<label>Numero de boleta <input required=""  class="form-control " type="text" name="boleta" placeholder="Numero de boleta" /></label>
  			<button type="submit" class="btn btn-success" >Buscar</button>
  			</form>
  			
  		</div>


  		<div class="col-md-6">
  			<form class="form-inline" method="post" action="/pc/yield/ensayo/codigo">
  			<input name="_token" type="hidden" value="{!! csrf_token() !!}" />
  			<label>Codigo de diseño <input  class="form-control" type="text" name="codigo" placeholder="Codigo de diseño"   required=""   /></label>
           <button type="submit" class="btn btn-success" >Buscar</button>
  			</form>
  			
  		</div>
  </div>	

  </div>

 
</div> {{--Modal busqueda de ensayo--}}





{{--Modal crear un molde--}}
<div class="remodal" data-remodal-id="molde_modal">
 <button data-remodal-action="close" class="remodal-close"></button>
 <h4 class="bg-success">Formulario para ingresar un nuevo molde </h4>
  <br>
  

  <div class="row">
  <div class="col-md-12">
  		<div class="col-md-4">
           <form class="form-inline" method="post" action="/pc/yield/molde">
  			<input name="_token" type="hidden" value="{!! csrf_token() !!}" />
  			<label>Nombre del molde <input required=""  class="form-control " type="text" name="Nombre_Molde" placeholder="Nombre del molde" /></label>
  			
  	     </div>

		<div class="col-md-4">
		<label>Peso del Molde <input required=""  class="form-control " type="text" name="Peso_Molde" placeholder="Digite su peso (kg)" /></label>
		</div>

		<div class="col-md-4">
		<label>Volumen del Molde <input required=""  class="form-control " type="text" name="Volumen_Molde" placeholder="Digite su volumen (m3)" /></label>
		</div>

         <button type="submit" class="btn btn-success" >Ingresar Nuevo</button>
       </form>
  			



  </div>		

  </div>

 
</div> {{--Modal busqueda de ensayo--}}




{{--Modal Llenado de datos--}}

@if(isset($carga))

<div class="remodal" data-remodal-id="llenadata_modal">
  <button data-remodal-action="close" class="remodal-close"></button>
  <h3 class="bg-success">Llenar Datos</h3>
  <br>
  
  <div class="row">
  		<div class="col-md-9">
  		
		  		<form class="form-horizontal" method="post" action="/pc/yield/crear">
		  		<input name="_token" type="hidden" value="{!! csrf_token() !!}" />
		   <div class="form-group">
		    <label  class="col-sm-6 control-label">Fecha de carga:</label>
		    <div class="col-sm-6">
		      <input value="" name="Fecha_Carga"  readonly="" type="text" class="form-control Fecha_de_Carga resetinput"  >
		    </div>
		  </div>

		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-6 control-label">Codigo de diseño</label>
		    <div class="col-sm-6">
		      <input type="text" class="form-control resetinput" name="Codigo" id="Codigo_Diseño" readonly="" value="" placeholder="Elemento">
		    </div>
		   </div>
		 
		   <hr>

		    <div class="form-group">
		    <label for="inputEmail3" class="col-sm-6 control-label">Hora de Ensayo</label>
		    <div class="col-sm-6">
		      <input required="" type="text" class="form-control" name="Hora_Ensayo"  value="" placeholder="Hora">
		    </div>
		   </div>

		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-6 control-label">Fecha Ensayo</label>
		    <div class="col-sm-6">
		      <input  class="form-control datepicker resetinput" type="text" name="Fecha_Ensayo" placeholder="Seleccione una fecha" style="cursor: pointer; background-color: white;"  required="" readonly=""   />
		    </div>
		   </div>

		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-6 control-label">Molde</label>
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
		    <label for="inputPassword3" class="col-sm-6 control-label">Peso del molde (kg)</label>
		    <div class="col-sm-6">
		      <input style="color:#0DBD47" type="text" name="Peso_Molde" readonly="" class="form-control pesomolde resetinput" placeholder="Peso">
		    </div>
		  </div>

		  <div class="form-group">
		    <label for="inputPassword3" class="col-sm-6 control-label">Volumen del molde (m3)</label>
		    <div class="col-sm-6">
		      <input style="color:#0DBD47" type="text" readonly=""  name="Volumen_Molde" class="form-control volumenmolde resetinput"  placeholder="volumen">
		    </div>
		  </div>
		  
		  <?php $agregado_sumado = 0;  ?>
		 
		 @foreach($agregado as $a)
		 <?php $agregado_sumado  = ((int)$agregado_sumado  + (int)$a->Cantidad_Total) ?>

		 @endforeach

		  
		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-6 control-label">Agregado (kg)</label>
		    <div class="col-sm-6">
		      <input type="text" value="{{$agregado_sumado }}" readonly="" name="Agregado" class="form-control resetinput" placeholder="Agregado">
		    </div>
		  </div>

		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-6 control-label">Cemento (kg)</label>
		    <div class="col-sm-6">
		      <input type="text" value="{{$cemento->Cantidad_Total}}" readonly="" id="Cemento" name="Cemento" class="form-control resetinput"  placeholder="CM">
		    </div>
		  </div>

		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-6 control-label">Aditivo (tls)</label>
		    <div class="col-sm-6">

		    <?php $Aditivo_formateado = number_format((float)($aditivo->Cantidad_Total /1000), 2, '.', ''); ?>

		      <input  type="number" step="0.01" readonly="" value="{{$Aditivo_formateado}}" name="Aditivo1" class="form-control resetinput"  placeholder="Aditivo">
		    </div>
		  </div>

		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-6 control-label">Aditivo2 (lts)</label>
		    <div class="col-sm-6">
		      <input required="" type="number" step="0.01"  name="Aditivo2" class="form-control"  placeholder="Aditivo 2">
		    </div>
		  </div>


		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-6 control-label">Agua (lts)</label>
		    <div class="col-sm-6">
		      <input type="text" readonly="" value="{{$agua->Cantidad_Total}}" name="Agua" class="form-control resetinput"  placeholder="Agua">
		    </div>
		  </div>

		   <div class="form-group">
		    <label  class="col-sm-6 control-label">Yield (cmts)</label>
		    <div class="col-sm-6">
		      <input required="" type="text" name="Yield" class="form-control "   placeholder="Yield">
		    </div>
		  </div>

		   <div class="form-group">
		    <label for="inputEmail3" class="col-sm-6 control-label">Volumen Teórico</label>
		    <div class="col-sm-6">
		      <input type="text" readonly="" name="Volumen_Teorico" id="Volumen_de_Carga" class="form-control resetinput"  >
		    </div>
		  </div>
		  
		 
		  
		  <div class="form-group">
		    <div class="col-sm-offset-6 col-sm-6">
		     
		      <button type="submit" class="btn btn-success">Grabar</button>
		      
		    </div>
		  </div>
		</form>


       </div>

</div>
</div>
{{--Modal Llenado de datos--}}
@endif


@endsection


@section('script')

<script type="text/javascript">
	
$(document).ready(function(){

  $(".llenardatos").click(function() {
      
       var fecha = $(this).data('fecha');
       var cod_diseño = $(this).data('codigo');
       var volumen = $(this).data('volumen');
       var cemento = $(this).data('cemento');
       

      


       $('.Fecha_de_Carga').val(fecha);
       $('#Codigo_Diseño').val(cod_diseño);
       $('#Volumen_de_Carga').val(volumen);
       


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
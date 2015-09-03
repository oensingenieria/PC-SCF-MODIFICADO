@extends('app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-12">
		<div style="margin-bottom:20px">
		<button class="btn btn-success"  data-remodal-target="buscarensayo_modal" >Buscar ensayo</button>
		<button class="btn btn-success" data-remodal-target="buscarhistorial_modal" >Buscar historial</button>
		<input class="btn btn-info pull-right" style="background-color: #32C0AC;" type="button" value="Imprimir" onClick="window.print()">
		</div>
			<div class="panel panel-default">
				<div class="panel-heading text-center"><b>TRANSFERENCIAS</b></div>

				<div class="panel-body">
				
				<div class="row">
				<div class="col-md-12" >
				
				
				@if(!isset($mixer) || $mixer == null)
					
				<p class="bg-info text-center" style="height:40px;padding-top:10px">Por favor realize una busqueda</p>


				@endif		
				


				</div>
				
				@if(isset($mixer))
				<div class="row">
				<div class="col-md-12  ">
				 <table class="table table-bordered">
 				
				   <thead>
				      <tr>
				        <td>Acciones</td>
				        <td>Numero de carga</td>
				        <td>Codigo de diseño</td>
				        <td>Diseño</td>
				        <td>Codigo del elemento</td>
				        <td>Nombre del elemento</td>
				        <td>Codigo del proyecto</td>
				        <td>Nombre del proyecto</td>
				        <td>Hora falla</td>
				        <td>Falla </td>
				        <td>Edad Cilindro</td>
		     
				      </tr>
				     </thead>
				     
                   <tbody>
                  @if(isset($cilindros)) 
                  <?php $promedio = 0; $divisor = 0; ?>
                   @foreach($cilindros as $cil)
				     <tr>
				       
				     	@if($cil->estado == "pendiente")
				     	<td><button  data-remodal-target="llenadata_modal" class="btn btn-warning llenardatos" data-numerocarga="{{$mixer->Numero_Carga}}" data-id="{{$cil->id}}" >Pendiente</button></td>
				     	@endif

				     	@if($cil->estado == "listo")
				     	<td><button   class="btn btn-info "  >{{$cil->Nombre_Cuenta}}</button></td>
				     	@endif


				     	<td>{{$mixer->Numero_Carga}}</td>
				     	<td>{{$mixer->Codigo_Diseño}}</td>
				     	<td>{{$mixer->Diseño}}</td>
                        <td>{{$mixer->Codigo_Elemento}}</td>
                        <td>{{$mixer->Nombre_Elemento}}</td>
				     	<td>{{$mixer->Codigo_Proyecto}}</td>
				     	<td>{{$mixer->Nombre_Proyecto}}</td>
				     	<td>{{$cil->hora}}</td>
				     	<td>{{$cil->falla}}</td>
				     	<td>
				     		@if($cil->estado == "listo")
				     		<?php  
				     		$Hora = (strtotime($cil->hora) - strtotime($mixer->Hora_de_Carga))*24;
                            echo date('H',$Hora);
                            ?>
				     		@endif

				     	</td>
				     	
				     	</tr>	
				     <?php $promedio = $promedio + $cil->falla ; 
                           if($cil->falla > 0 ){ $divisor++; }
				       ?>
				     	 @endforeach 
				     	 @endif
				     </tbody>


				</table>
			   <?php if($divisor == 0 ){ $divisor = 1;} ?>
		       <p style="margin: 0px 0px 10px;color: blue;font-weight: initial;margin-left: 10px;">PROMEDIO DE LA CARGA : <b> {{number_format((float)$promedio/$divisor, 2, '.', '')}} </b> </p>
				@endif

				</div>
				</div>
				
				</div>


				</div>
				
			</div>
		</div>
	</div>
</div>
</div>
</div>


{{--Modal busqueda transferencia--}}
<div class="remodal" data-remodal-id="buscarensayo_modal">
 <button data-remodal-action="close" class="remodal-close"></button>
 <h4 class="bg-success">Busqueda de ensayo </h4>
  <br>
  

  <div class="row">
  <div class="col-md-12">
  		<form class="form-horizontal" method="post" action="/pc/transferencia/fecha">
  			<input name="_token" type="hidden" value="{!! csrf_token() !!}" />
  			<div class="col-md-12">
  			<label>Fecha de ensayo <input required=""  class="form-control datepicker" type="text" name="Parametro" placeholder="Seleccione una fecha" style="cursor: pointer; background-color: white;"  required="" readonly=""  /></label>
  			</div>

  			<div class="col-md-12">
           <button type="submit" class="btn btn-success">Buscar</button>
           </div>
  		</form>	
  </div>		

  </div>

 
</div> {{--Modal busqueda transferencia--}}



{{--Modal busqueda de historial--}}
<div class="remodal" data-remodal-id="buscarhistorial_modal">
  <button data-remodal-action="close" class="remodal-close"></button>
  <h3 class="bg-success">Busqueda de historial</h3>
  <br>
  

  <div class="row">
  <div class="col-md-12">
  		<div class="col-md-6">
  			<form class="form-inline" method="post" action="/pc/transferencia/carga/historial" >
  			<input name="_token" type="hidden" value="{!! csrf_token() !!}" />
  			<label>Numero de carga <input required  class="form-control" type="text" name="Parametro" placeholder="Numero de carga" /></label><button  class="btn btn-success" style="margin-bottom:65px;">Buscar</button>
          </form>
       </div>


       <div class="col-md-6">
  			<form class="form-inline" method="post" action="/pc/transferencia/fecha/historial" >
  			 <input name="_token" type="hidden" value="{!! csrf_token() !!}" />
  			<label>Fecha de Carga&nbsp;&nbsp;<input  type="text" name="Parametro"   style="cursor: pointer; background-color: white;"  required="" readonly=""  type="Text" class="form-control  datepicker"  placeholder="Ingrese una fecha" ></label><button  class="btn btn-success " >Buscar</button>
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
</div> {{--Modal busqueda historial--}}





{{--Modal Llenado de datos--}}

<div class="remodal" data-remodal-id="llenadata_modal">
  <button data-remodal-action="close" class="remodal-close"></button>
  <h3 class="bg-success">Datos de la falla</h3>
  <br>
  
  <div class="row">
  		<div class="col-md-12">
  		
		  		<form class="form-horizontal" method="post" action="/pc/transferencias">
		  		<input name="_token" type="hidden" value="{!! csrf_token() !!}" />
		   <div class="form-group">
  			<label>Fecha de ingreso <input  class="form-control  datepicker" type="text" name="fecha" placeholder="Seleccione una fecha" style="cursor: pointer; background-color: white;"  required="" readonly=""  /></label>
           </div>	

            <div class="form-group">
  			<label>Hora de falla <input  class="form-control fechaingresada timepicker" type="text" name="hora" placeholder="Hora"  /></label>
           </div>

              <div class="form-group">
  			<label>Falla (kg/cm2) <input  class="form-control" type="number" step="0.01" name="falla" placeholder="Ingrese falla"  /></label>
           </div>


           <input type="hidden" class="numerocarga" name="id_cod_carga">
           <input type="hidden" class="idunique" name="id">

          
		  <div class="form-group">
		  

		     
		      <button type="submit" class="btn btn-success">Grabar</button>
		   
		      
		    </form>
		  </div>
		  </div>
		


       </div>

</div>
</div>
{{--Modal Llenado de datos--}}


@endsection

@section('script')

<script type="text/javascript">
	
$(document).ready(function(){

  $(".llenardatos").click(function() {
      
       var numerocarga = $(this).data('numerocarga');
       var id = $(this).data('id');
     
       $('.idunique').val(id);
       


      });

    });


</script>



@endsection

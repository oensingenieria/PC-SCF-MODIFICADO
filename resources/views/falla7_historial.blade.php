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
				<table class="table table-bordered tablePag">
 				
				   <thead class="bg-success">
				      <tr>
				        <td>Usuario</td>
				        <td>Numero Carga</td>
				        <td>Codigo Diseño</td>
				        <td>Fecha Registro</td>
				        <td>Dias</td>
				        <td>Falla 1</td>
				        <td>Falla 2</td>
				        <td>Falla 3</td>
				        <td>Promedio</td>
				        <td>Res Nominal</td>
				        <td>Res Porcentaje</td>
				        <td>Encargado</td>

				      </tr>
				     </thead>	

				     <tbody>

				     @foreach($carga as $mix)
				     	<tr>
				     	
				     	

					 	<td><button class="btn btn-info " >{{$mix->Nombre_Cuenta}}</button></td>
				     	<td>{{$mix->Numero_Carga}}</td>
				     	<td>{{$mix->Codigo_Diseño}}</td>
				     	<td>{{$mix->Fecha_Registro}}</td>
				     	<td>{{$mix->Numero_Dias}}</td>
				     	<td>{{$mix->Falla1}}</td>
				     	<td>{{$mix->Falla2}}</td>
				     	<td>{{$mix->Falla3}}</td>
				     	<td>{{$mix->Resis_Promedio}}</td>
				     	<td>{{$mix->Resis_Nominal}}</td>
				     	<td>{{$mix->Resis_Porcentual}}</td>
						<td  style="color:blue">{{$mix->Encargado}}</td>
				     	

				     </tr>

				     @endforeach

				     </tbody>

				</table>

				@else
				
				<p class="bg-danger text-center" style="height:40px;padding-top:10px"><b>Historial de datos no encontrados.</b></p>
				
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


@endsection

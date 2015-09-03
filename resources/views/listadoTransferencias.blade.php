@extends('app')

@section('content')

@if(isset($historial))
<style type="text/css">

table .btn-success{
	background-color: #6784C8;
    border-color: #201BDA;
}

table .btn-success:hover{
	background-color: blue;
}

</style>

@endif

<div class="container">
	<div class="row">
		<div class="col-md-12">
		<div style="margin-bottom:20px">
		<button class="btn btn-success"  data-remodal-target="buscarensayo_modal" >Buscar ensayo</button>
		<button class="btn btn-success" data-remodal-target="buscarhistorial_modal" >Buscar historial</button>
		<input class="btn btn-info pull-right" style="background-color: #32C0AC;" type="button" value="Imprimir" onClick="window.print()">
		</div>
			<div class="panel panel-default">
				<div class="panel-heading text-center">Busqueda de <b>TRANSFERENCIAS</b> basada en la fecha  <b>{{$fechabusqueda}}</b></div>

				<div class="panel-body">
				
				<div class="row">
				
		   @if(isset($mixer) && count($mixer) > 0)
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
				        <td>Fecha</td>
				    
		     
				      </tr>
				     </thead>
				     
                   <tbody>
                
                   @foreach($mixer as $mix)
				     <tr>
				       
				     
				     	
				     	<td><a href="/pc/transferencias/fecha/{{$mix->Numero_Carga}}"  class="btn btn-success "  >Transferencia</a></td>
				     	

				     	<td>{{$mix->Numero_Carga}}</td>
				     	<td>{{$mix->Codigo_Diseño}}</td>
				     	<td>{{$mix->Diseño}}</td>
                        <td>{{$mix->Codigo_Elemento}}</td>
                        <td>{{$mix->Nombre_Elemento}}</td>
				     	<td>{{$mix->Codigo_Proyecto}}</td>
				     	<td>{{$mix->Nombre_Proyecto}}</td>
				     	<td>{{$mix->Fecha_de_Carga}}</td>
				     	
				     	
				     	</tr>	
				     
				     	 @endforeach 
				     	
				     </tbody>


				</table>
		    	

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
  			<form class="form-inline"  method="post" action="/pc/transferencia/carga/historial" >
  			<input name="_token" type="hidden" value="{!! csrf_token() !!}" />
  			<label>Numero de carga <input required  class="form-control" type="text" name="Parametro" placeholder="Numero de carga" /></label><button  class="btn btn-success" style="margin-bottom:65px;">Buscar</button>
          </form>
       </div>


       <div class="col-md-6">
  			<form class="form-inline" method="post" action="/pc/transferencia/fecha/historial" >
  			 <input name="_token" type="hidden" value="{!! csrf_token() !!}" />
  			<label>Fecha de Carga&nbsp;&nbsp;<input  type="text" name="Parametro"   style="cursor: pointer; background-color: white;"  required="" readonly=""  type="Text" class="form-control  datepicker"  placeholder="Ingrese una fecha" ></label><button class="btn btn-success " >Buscar</button>
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


@endsection
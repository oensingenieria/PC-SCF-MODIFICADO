@extends('app')

@section('content')

<div class="container">
	<div class="row">
	<div class="col-md-12" style="margin-bottom:20px">
	
	<button class="btn btn-success" data-remodal-target="buscarmixer_modal" >Buscar ensayo</button>
	<button class="btn btn-success" data-remodal-target="buscarhistorial_modal" >Buscar historial</button>
	<input class="btn btn-info pull-right" style="background-color: #32C0AC;" type="button" value="Imprimir" onClick="window.print()">
    <button style="margin-right:20px" class="btn btn-info pull-right" data-remodal-target="infotrabajabilidad_modal" > <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span></button>
	
	</div>
	

		<div class="col-md-12 ">
			<div class="panel panel-default">
				<div class="panel-heading text-center" ><b>{{$titlemesage}}</b></div>
				<div class="panel-body">
				
				<div class="row">
				<div class="col-md-12  ">
			@if(isset($mixer))	
				@if(!is_null($mixer) & count($mixer) > 0)	
				<table class="table table-bordered tablePag">
 				
				   <thead class="bg-success " style="font-weight:bold" >
				      <tr>
				        <td>Usuario</td>
				        <td>Numero carga</td>
				        <td>Nombre de proyecto</td>
				        <td>Nombre del elemento</td>
				        <td>Hora de ensayo</td>
				        <td>Trabajabilidad y flujo (cm) </td>
				        <td>Temperatura (°C)</td>
				        <td>Volumen (m3)</td>
				        <td>Codigo Tarro</td>
				        <td>Encargado</td>

				      </tr>
				     </thead>	

             <div> 
				
				     <tbody >
				     
       
			 	@foreach($mixer as $mix)
				 
				 <tr >
					 	<td><button  class="btn btn-info"  >{{$mix->Nombre_Cuenta}}</button></td>


				     	<td>{{$mix->Numero_Carga}}</td>
				     	<td>{{$mix->Nombre_Proyecto}}</td>
				     	<td>{{$mix->Nombre_Elemento}}</td>
				     	<td>{{$mix->Hora_Ensayo}}</td>
				     	<td>{{$mix->Revenimiento}}</td>
				     	<td>{{$mix->Temperatura}}</td>
				     	<td>{{$mix->Volumen}}</td>
				     	<td>{{$mix->Codigo_Tarro}}</td>
				     	<td style="color:blue">{{$mix->Encargado}}</td>
			      </tr>
           
                @endforeach

				     </tbody>

				</table>

				@else
				<p class="bg-danger text-center" style="height:40px;padding-top:10px"><b>No se han encontrado ensayos realizados con ese parametro</b></p>
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

{{--Modal busqueda de ensayo--}}
<div class="remodal" data-remodal-id="buscarmixer_modal">
  <button data-remodal-action="close" class="remodal-close"></button>
  <h3 >Buscar Ensayos Pendientes</h3>
  <br>
  

  <div class="row">
  <div class="col-md-12">
      <div class="col-md-6">
        <form class="form-horizontal" method="post" action="/pc/trabajabilidad_flujo/carga">
        <input name="_token" type="hidden" value="{!! csrf_token() !!}" />
        <div class="form-group">
        <label>Numero de carga <input required  class="form-control" type="text" name="Parametro" placeholder="Numero de carga" /></label>
      </div>

        <div class="form-group"> 
          <button class="btn btn-success" style="margin-bottom:65px;">Buscar</button>
        </div>  
          </form>
       </div>


      <div class="col-md-6">
        
          <form class="form-horizontal"  method="post" action="/pc/trabajabilidad_flujo/codigo" >
          <input name="_token" type="hidden" value="{!! csrf_token() !!}" />
          <div class="form-group">
        <label>Codigo de diseño <input required="" class="form-control" type="text" name="Parametro" placeholder="Codigo" /></label></div>

        <div class="form-group">
          <button class="btn btn-success" style="margin-bottom:65px;">Buscar</button>
        </div>
        
        </form>

      </div>

  </div>

  <div class="col-md-12">
  
        <form class="form-horizontal" method="post" action="/pc/trabajabilidad_flujo/fecha">
         <input name="_token" type="hidden" value="{!! csrf_token() !!}" />
         <div class="form-group">
        <label>Fecha de Ensayo&nbsp;&nbsp;<input  type="text" name="Parametro"   style="cursor: pointer; background-color: white;"  required="" readonly=""  type="Text" class="form-control  datepicker"  placeholder="Ingrese una fecha" ></label></div>

        <div class="form-group"> <button class="btn btn-success " >Buscar</button></div>
        </form>

      
     </div>
  </div> 
</div> {{--Modal busqueda de ensayo--}}




{{--Modal busqueda de historial--}}
<div class="remodal" data-remodal-id="buscarhistorial_modal">
  <button data-remodal-action="close" class="remodal-close"></button>
  <h3>Buscar Ensayos Realizados</h3>
  <br>
  

  <div class="row">
  <div class="col-md-12">
      <div class="col-md-6">
        <form class="form-horizontal" method="post" action="/pc/trabajabilidad_flujo/carga/historial">
        <input name="_token" type="hidden" value="{!! csrf_token() !!}" />
        
        <label>Numero de carga <input required  class="form-control" type="text" name="Parametro" placeholder="Numero de carga" /></label>
      

        <div class="form-group">
         <button class="btn btn-success " >Buscar</button>
       </div>
    
          </form>
       </div>


       <div class="col-md-6">
        <form class="form-horizontal" method="post" action="/pc/trabajabilidad_flujo/fecha/historial">
         <input name="_token" type="hidden" value="{!! csrf_token() !!}" />
         
        <label>Fecha de Carga&nbsp;&nbsp;<input  type="text" name="Parametro"   style="cursor: pointer; background-color: white;"  required="" readonly=""  type="Text" class="form-control  datepicker"  placeholder="Ingrese una fecha" ></label>
      
        <div class="form-group">
           <button class="btn btn-success " >Buscar</button>
        </div>
        </form>

      </div>
  </div>

      <div class="col-md-12">
      
        <form class="form-horizontal" method="post" action="/pc/trabajabilidad_flujo/fecha_rango/historial" >
         <input name="_token" type="hidden" value="{!! csrf_token() !!}" />
         
        <label>Rango de fecha<input  type="text" name="Desde"   style="cursor: pointer; background-color: white; margin-bottom:5px"  required="" readonly=""  type="Text" class="form-control  datepicker"  placeholder="Desde" >
        

        <div class="col-md-12">
          <input  type="text" name="Hasta"   style="cursor: pointer; background-color: white; margin-bottom:5px ;"  required="" readonly=""  type="Text" class="form-control  datepicker"  placeholder="Hasta" >
         </div>
         
        <div class="col-md-12" > 
         </label><button class="btn btn-success " >Buscar</button>
        
        </div>

        </form>

      
     </div> 
</div> 
 
</div> {{--Modal busqueda historial--}}

{{--Modal Info--}}
<div class="remodal" data-remodal-id="infotrabajabilidad_modal">
  <button data-remodal-action="close" class="remodal-close"></button>
  <h3 >Funcionamiento</h3>
  <br>
  
  <div class="row">
  <div class="col-md-12">
    <p class="text-justify">El sistema de trabajabilidad y flujo se conecta  a los registro disponible del mixer , según el parámetro de búsqueda que se ingrese. El usuario podrá ver los datos resultantes en una lista ordenada con varios filtros disponibles que podrá utilizar para su comodidad.

    </p>  
    <br>
    <p class="text-justify">Al momento de ingresar los datos  el usuario puede otorgar los permisos de ese ensayo , para que estos puedan ser trabajados posteriormente por otros ensayos tales como vebe , transferencias , falla 7 y falla 8 , o incluso podrá marcar el ensayo como desecho según lo requiera.

    </p> 
 
  </div>

  </div>
    
</div> {{--Modal info--}}


@endsection

@extends('app')

@section('content')

<div class="container">
	<div class="row">
	<div class="col-md-12" style="margin-bottom:20px">
	<button class="btn btn-success" data-remodal-target="buscarmixer_modal" >Buscar ensayo</button>
	<button class="btn btn-success" data-remodal-target="buscarhistorial_modal" >Buscar historial</button>

	<input class="btn btn-info pull-right" style="background-color: #32C0AC;" type="button" value="Imprimir" onClick="window.print()">
	<button style="margin-right:20px" class="btn btn-info pull-right" data-remodal-target="infovebe_modal" > <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span></button>
	</div>
	

		<div class="col-md-12 ">
			<div class="panel panel-default">
				<div class="panel-heading text-center">  <b>{{$titlemesage}}</b></div>
				<div class="panel-body">
				
				<div class="row">
				<div class="col-md-12  ">

			@if(isset($carga) )
				@if(count($carga) > 0  )	
				<table class="table table-bordered tablePag">
 				
				   <thead class="bg-success">
				      <tr>
				        <td>Usuario</td>
				        <td>Numero carga</td>
				        <td>Nombre Proyecto</td>
				        <td>Nombre Elemento</td>
				        <td>Diseño</td>
				        <td>Vebe</td>
				        <td>Peralte</td>
				        <td>Encargado</td>
				        

				      </tr>
				     </thead>	


				
				     <tbody>

				     @foreach($carga as $mix)	

				      <tr>
						 	<td><button class="btn btn-info "  >{{$mix->Nombre_Cuenta}}</button></td>
						 	
					     	<td>{{$mix->Numero_Carga}}</td>
					     	<td>{{$mix->Nombre_Proyecto}}</td>
					     	<td>{{$mix->Nombre_Elemento}}</td>
					     	<td>{{$mix->Diseño}}</td>
					     	<td>{{$mix->Vebe}}</td>
					     	<td>{{$mix->Peralte}}</td>
					     	<td  style="color:blue" >{{$mix->Encargado}}</td>
				     	
				     </tr>
				     
				     @endforeach
				     


				     </tbody>

				</table>
				@else
				<p class="bg-danger text-center" style="height:40px;padding-top:10px"><b>Datos no encontrados . Por favor realize una nueva busqueda.</b></p>
				@endif

				@endif

				</div>
				
			
				</div>
				
				</div>
			</div>
		</div>
	</div>
</div>{{--End Container--}}

{{--Modal busqueda en mixer--}}
<div class="remodal" data-remodal-id="buscarmixer_modal">
  <button data-remodal-action="close" class="remodal-close"></button>
  <h3>Seleccione una fecha</h3>
  <br>
  

  <div class="row">
  <div class="col-md-12">
      <div class="col-md-12">
        <form class="form-horizontal" method="post" action="/pc/vebe/fecha">
        <input name="_token" type="hidden" value="{!! csrf_token() !!}" />
        
        <div class="form-group"> 
        <label>Fecha de ensayo <input required=""  class="form-control datepicker" type="text" name="fecha" placeholder="Seleccione una fecha" style="cursor: pointer; background-color: white;"  required="" readonly=""   /></label>
        </div>

        <div class="form-group"> 
        <button class="btn btn-success" style="margin-bottom:65px;">Buscar</button>
        </div>
        
        </form>

      </div>

  </div>

  </div>
    
</div> {{--Modal busqueda en mixer--}}



{{--Modal busqueda de historial--}}
<div class="remodal" data-remodal-id="buscarhistorial_modal">
  <button data-remodal-action="close" class="remodal-close"></button>
  <h3 >Busqueda de historial</h3>
  <br>
  

  <div class="row">
  <div class="col-md-12">
      <div class="col-md-6">
        <form class="form-horizontal" method="post" action="/pc/vebe/carga/historial" >
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
        <form class="form-horizontal" method="post" action="/pc/vebe/fecha/historial">
         <input name="_token" type="hidden" value="{!! csrf_token() !!}" /> 

        <div class="form-group">
        <label>Fecha de Ensayo&nbsp;&nbsp;<input  type="text" name="Parametro"   style="cursor: pointer; background-color: white;"  required="" readonly=""  type="Text" class="form-control  datepicker"  placeholder="Ingrese una fecha" ></label>
        </div>

        <div class="form-group">
        <button class="btn btn-success " >Buscar</button>
        </div>

        </form>

      </div>
     </div>

    <div class="col-md-12">
    <form class="form-horizontal" method="post" action="/pc/vebe/rango/historial">
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
</div> {{--Modal busqueda historial--}}





{{--Modal Info--}}
<div class="remodal" data-remodal-id="infovebe_modal">
  <button data-remodal-action="close" class="remodal-close"></button>
  <h3 >Funcionamiento</h3>
  <br>
  
  <div class="row">
  <div class="col-md-12">
    <p class="text-justify">El sistema Vebe traéra los registros que coincidan con el parámetro de búsqueda especificado y según los permisos que se hallan agregado en trabajabilidad y flujo, pero además los registros serán filtrados para aquellos que contengan cualquiera de los siguientes código de elemento.

    </p>  
  <div class="col-md-5 text-left">
    <ul>
     
    <li>10017415</li>
    

    </ul>
  </div>  

  <div class="col-md-5 text-left">
    <ul>
     
    <li>10017414</li>
   


    </ul>
  </div>
  <br>

  </div>

<div class="col-md-12">
  <br>
  <p class="text-justify"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> En cuyo caso Vebe encuentre registros que coincidan con el parámetro de la búsqueda , pero dichos registros no poseen algún código de elemento previamente definido , vebe lo omitirá.</p>

  <br>
  <p class="text-justify"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Si en trababilidad y flujo no se otorgan los permisos de acceso al ensayo vebe también quedaran omitidos.</p>

</div>

  </div>
    
</div> {{--Modal info--}}



@endsection
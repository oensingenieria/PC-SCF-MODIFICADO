@extends('app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-12">
		<div style="margin-bottom:20px">
		<button class="btn btn-success"  data-remodal-target="buscarensayo_modal" >Buscar ensayo</button>
		<button class="btn btn-success" data-remodal-target="buscarhistorial_modal" >Buscar historial</button>
		<input class="btn btn-info pull-right" style="background-color: #32C0AC;" type="button" value="Imprimir" onClick="window.print()">
		<button style="margin-right:20px" class="btn btn-info pull-right" data-remodal-target="infotransferencia_modal" > <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span></button>
		</div>
			<div class="panel panel-default">
				<div class="panel-heading text-center"><b>{{$titlemesage}}</b></div>

				<div class="panel-body">
				
				<div class="row">
				<div class="col-md-12" >
				
				</div>
				
				
				<div class="row">
				<div class="col-md-12  ">
				
			  @if(isset($carga))	
				@if(!is_null($carga) & count($carga) > 0 )
				 <table class="table table-bordered tablePag">
 				
				   <thead class="bg-success">
				      <tr>
				        <td>Usuario</td>
				        <td>Numero Carga</td>
				        <td>Cod.Diseño</td>
				        <td>Diseño</td>
				        <td>Nombre Proyecto</td>
				        <td>Falla1 | Edad</td>
				        <td>Falla2 | Edad</td>
				        <td>Falla3 | Edad</td>
				        <td>Promedio Carga</td>
				        <td>Encargado</td>

				       
				        
				        
				      </tr>
				     </thead>
				     
                   <tbody>
                 @foreach($carga as $c)
				     <tr>
				       
				     	<td><button class="btn btn-info">{{$c->Nombre_Cuenta}}</button></td>
				     	<td>{{$c->Numero_Carga}}</td>
				     	<td>{{$c->Codigo_Diseño}}</td>
                        <td>{{$c->Diseño}}</td>
                        <td>{{$c->Nombre_Proyecto}}</td>
				     	<td>{{$c->Falla1}} <b>|</b> {{$c->Edad_f1}}</td>
				     	<td>{{$c->Falla2}} <b>|</b> {{$c->Edad_f2}}</td>
				     	<td>{{$c->Falla3}} <b>|</b> {{$c->Edad_f3}}</td>
				     	<td>{{$c->Promedio_Carga}}</td>
				     	<td style="color:blue">{{$c->Encargado}}</td>
				    
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
	</div>
</div>
</div>
</div>

{{--Modal busqueda transferencia--}}
<div class="remodal" data-remodal-id="buscarensayo_modal">
 <button data-remodal-action="close" class="remodal-close"></button>
 <h4 >Busqueda de ensayo </h4>
  <br>
  

  <div class="row">
  <div class="col-md-12">
  		<form class="form-horizontal" method="post" action="/pc/transferencias/fecha">
  			<input name="_token" type="hidden" value="{!! csrf_token() !!}" />
  			<div class="col-md-12">
  			<label>Fecha de ensayo <input  class="form-control datepicker" type="text" name="Parametro" placeholder="Seleccione una fecha" style="cursor: pointer; background-color: white;"  required="" readonly=""  /></label>
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
 <h4 >Seleccione un medio de busqueda </h4>
  <br>
  

  <div class="row">
  <div class="col-md-12">
  		<div class="col-md-6">
  			<form class="form-horizontal" method="post" action="/pc/transferencias/carga/historial">
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
  			<form class="form-horizontal" method="post" action="/pc/transferencias/fecha/historial">
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
     
       
        <form class="form-horizontal" method="post" action="/pc/transferencias/rango/historial">
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

{{--Modal Info--}}
<div class="remodal" data-remodal-id="infotransferencia_modal">
  <button data-remodal-action="close" class="remodal-close"></button>
  <h3 >Funcionamiento</h3>
  <br>
  
  <div class="row">
  <div class="col-md-12">
    <p class="text-justify">El sistema de transferencias se filtra según los ensayos a los cuales se les otorgo el permiso respectivo en trabajabilidad y flujo , se traen lo ensayos del día anterior a la fecha ingresada con un alcance de cinco días atrás .

    </p>  
    <br>
    <p class="text-justify">La edad de los cilindros sera calculada por el sistema automáticamente cuando un ensayo de transferencia sea ingresado con éxito 

    </p> 
 
  </div>

  </div>
    
</div> {{--Modal info--}}


@endsection

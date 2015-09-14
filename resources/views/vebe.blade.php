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
				@if(!is_null($carga) & count($carga) > 0  )
				<table class="table table-bordered tablePag">
 				
				   <thead class="bg-success">
				      <tr>
				        <td>Acción</td>
				        <td>Numero carga</td>
				        <td>Nombre Proyecto</td>
				        <td>Codigo Proyecto</td>
				        <td>Nombre Elemento</td>
				        <td>Codigo Elemento</td>
				        <td>Diseño</td>
				        <td>Codigo Diseño</td>
				       

				      </tr>
				     </thead>	


					  
				     <tbody>

				  
				     @foreach($carga as $mix)
				     
				     	<tr>
						 	<td><button  class="btn btn-success llenardatos" data-numerocarga="{{$mix->Numero_Carga}}" 
						 	data-fechaensayo="{{$mix->Fecha_Ensayo}}" data-volumen="{{$mix->Volumen_de_Carga}}" data-humedad="{{$mix->Humedad_Mezcla}}"	data-remodal-target="llenardatos_modal" >Seleccionar</button></td>
					     	<td>{{$mix->Numero_Carga}}</td>
					     	<td>{{$mix->Nombre_Proyecto}}</td>
					     	<td>{{$mix->Codigo_Proyecto}}</td>
					     	<td>{{$mix->Nombre_Elemento}}</td>
					     	<td>{{$mix->Codigo_Elemento}}</td>
					     	<td>{{$mix->Diseño}}</td>
					     	<td>{{$mix->Codigo_Diseño}}</td>
					     
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






{{--Modal Llenado de datos--}}
@if(isset($carga))
<div class="remodal" data-remodal-id="llenardatos_modal">
  <button data-remodal-action="close" class="remodal-close"></button>
  <h3><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>&nbsp; Formulario</h3>
  <br>
  
  <div class="row">
  	<div class="col-md-12">
  		<form method="post" action="/pc/vebe" class="form-vebe"> 		
  		<input name="_token" type="hidden" value="{!! csrf_token() !!}" />
  
  	 <table class="table table-bordered" >
  		
  		<thead >
				      <tr>
				      <?php date_default_timezone_set('America/Costa_Rica'); ?>
				      <td ><input style="color:#459645" value="{{date ( 'Y-m-d' )}}"  class="form-control" type="text" name="Fecha_Registro" placeholder="Ingrese fecha" style=" background-color: white;"  required="" readonly=""  ></td>
				        
				         <td >
                           <select name="Pista" class="form-control"> 
                           <option  value="Pista 1">Pista 1</option>
                           <option  value="Pista 2">Pista 2</option>
                           <option  value="Pista 3">Pista 3</option>
                           <option  value="Pista 4">Pista 4</option>
                           <option  value="Pista 5">Pista 5</option>
                           <option  value="Pista 6">Pista 6</option>
                           <option  value="Pista 7">Pista 7</option>
                           <option  value="Pista 8">Pista 8</option>
                           <option  value="Pista 9">Pista 9</option>
                           <option  value="Pista 10">Pista 10</option>
                           </select>

				         </td>
				         

				      </tr>
				      <tr>
				      <td ><input type="text" style="color:#459645" readonly="" name="Numero_Carga" id="numerocarga" class="form-control pull-left" ></td>
				        <td><select name="Tarro" class="form-control" > 
				        <option value="Tarro 1">Tarro 1</option>
				        <option value="Tarro 2">Tarro 2</option>
				        <option value="Tarro 3">Tarro 3</option>
				        <option value="Tarro 4">Tarro 4</option>
				        <option value="Tarro 5">Tarro 5</option>
				        <option value="Tarro 6">Tarro 6</option>
				        <option value="Tarro 7">Tarro 7</option>
				        <option value="Tarro 8">Tarro 8</option>
				        <option value="Tarro 9">Tarro 9</option>
				        <option value="Tarro 10">Tarro 10</option>
				        <option value="Tarro 11">Tarro 11</option>
				        <option value="Tarro 12">Tarro 12</option>

				        </select></td>

				     
				      </tr>
			  </thead>	

		 <tbody>
                   
				  
				   <tr>
				   	 <td><strong>Mezcla</strong> </td>
				   	 <td><select name="Mezcla" class="form-control" > 
				        <option value="E">E</option>
				        <option value="W">W</option>
				       </select></td>


				   </tr>


				   <tr>
				   	 <td><strong>Peralte</strong> </td>
				   	 <td><select name="Peralte" class="form-control" > 
				        <option value="25">08</option>
				        <option value="25">15</option>
				        <option value="20">20</option>
				        <option value="25">25</option>
				       </select></td>

				 
				   </tr>


				   <tr>
				   	 <td><strong>Volumen</strong> </td>
				   	 <td>
				   	 	<input  readonly="" id="volumenmix" type="number" step="0.01" name="Volumen" class="form-control" required="" placeholder="Digite volumen">

				   	 </td>

				   </tr>

				   <tr>
				   	 <td><strong>Sensor de humedad</strong> </td>
				   	 <td>
				   	 	<input  readonly="" id="humedadmix" type="number" step="0.01" name="Humedad" class="form-control" required="" placeholder="Digite humedad">

				   	 </td>


				   </tr>

				   <tr>
				   	 <td><strong>Amperimetros</strong> </td>
				   	 <td>
				   	 	<input type="number" step="0.01" name="Amperimetro" class="form-control" required="" placeholder="Digite Amperimetro">

				   	 </td>

				   

				   </tr>


				   <tr>
				   	 <td><strong>Vebe</strong> </td>
				   	 <td>
				   	 	<input type="number" step="0.01" name="Vebe" class="form-control" required="" placeholder="Digite Vebe">

				   	 </td>


				   </tr>

				   <tr>
				   	 <td><strong>Encargado:</strong> </td>
				   	 <td>
				   	 	 <select name="Encargado" class="form-control" >
				            @foreach($encargados as $encargado)
				            <option value="{{$encargado->nombre}}" > {{$encargado->nombre}} </option>
				            @endforeach
				          </select>

				   	 </td>


				   </tr>



				     </tbody>

     	</table>

     	<input type="hidden" name="Fecha_Ensayo" id="fecha_ensayo">	

     	
        <button type="submit" class="btn btn-success pull-right">Guardar</button>
       
      </form>
  	</div>	


       

</div>
</div>
@endif
{{--Modal Llenado de datos--}}


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

@section('script')

<script type="text/javascript">
	
$(document).ready(function(){

  $(".llenardatos").click(function() {
      
      
       var numerocarga = $(this).data('numerocarga');
       var fechaensayo = $(this).data('fechaensayo');
       var volumenmix = $(this).data('volumen');
       var humedadmix = $(this).data('humedad');

       
       $('#numerocarga').val(numerocarga);
       $('#fecha_ensayo').val(fechaensayo);
       $('#volumenmix').val(volumenmix);
       $('#humedadmix').val(humedadmix);


      });

  
      
      


    });


</script>



@endsection
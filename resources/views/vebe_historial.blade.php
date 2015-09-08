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
				<table class="table table-bordered">
 				
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
				        <td colspan="3" style="text-align:center">Vebe</td>
				        

				      </tr>
				     </thead>	


				
				     <tbody>

				    @if(isset($ensayo))
              
				     @foreach($ensayo as $mix)
				     	<tr>
				     	
				     	

					 	<td><button class="btn btn-info " >Realizada</button></td>
				     	<td>{{$mix->Numero_Carga}}</td>
				     	<td>{{$mix->Codigo_Diseño}}</td>
				     	<td>{{$mix->Nombre_Proyecto}}</td>
				     	<td>{{$mix->Fecha_Moldeo}}</td>
				     	<td>{{$mix->Falla1}}</td>
				     	<td>{{$mix->Falla2}}</td>
				     	<td>{{$mix->Falla3}}</td>
				     	<td>{{$mix->Resis_Promedio}}</td>
				     	<td>{{$mix->Resis_Nominal}}</td>
				     	<td>{{$mix->Resis_Porcentual}}</td>
			
				     	

				     </tr>

				     @endforeach

				     @endif
				     
				     @if(isset($mixer))	

				     <?php 
				     $pass = true;
				     $carga = null;

				     

				      ?>
				     	@foreach($mixer as $mix)
				     	<tr>
				     	
				     	<?php 
				     	if ($carga != $mix->Numero_Carga ) {
				     		$pass = true;

				     	}  

				     	?>

				     	@if($pass)
				     	<?php $carga = $mix->Numero_Carga ;
				     		  $pass=false; 	
				     	 ?>
				     	@if(isset($ensayo)) 

				     	 @if(recorreEnsayo( $ensayo , $mix->Numero_Carga))
						 	<td><button  class="btn btn-success llenardatos" data-numerocarga="{{$mix->Numero_Carga}}" data-remodal-target="llenardatos_modal" >Seleccionar</button></td>
					     	<td>{{$mix->Numero_Carga}}</td>
					     	<td>{{$mix->Codigo_Diseño}}</td>
					     	<td>{{$mix->Nombre_Proyecto}}</td>
					     	<td>{{$mix->Fecha_de_Carga}}</td>
					     	<td></td>
					     	<td></td>
					     	<td></td>
					     	<td></td>
					     	<td></td>
					     	<td></td>
					     @endif	
					    @endif	

					  	@if(isset($comparaensayo)) 
					  	
					        @if(exist_vebe($mix->Numero_Carga , $comparaensayo))
						 	<td><button class="btn btn-info "  >Ingresado</button></td>
						 	@else
						 	<td><button class="btn btn-success llenardatos" data-numerocarga="{{$mix->Numero_Carga}}" data-remodal-target="llenardatos_modal" >Seleccionar</button></td>
						 	@endif

					     	<td>{{$mix->Numero_Carga}}</td>
					     	<td>{{$mix->Nombre_Proyecto}}</td>
					     	<td>{{$mix->Codigo_Proyecto}}</td>
					     	<td>{{$mix->Nombre_Elemento}}</td>
					     	<td>{{$mix->Codigo_Elemento}}</td>
					     	<td>{{$mix->Diseño}}</td>
					     	<td>{{$mix->Codigo_Diseño}}</td>
					     	<td>{{getTarro1($mix->Numero_Carga , $comparaensayo)}} <br> {{getVebe1($mix->Numero_Carga , $comparaensayo)}}</td>
					     	<td>{{getTarro2($mix->Numero_Carga , $comparaensayo)}} <br> {{getVebe2($mix->Numero_Carga , $comparaensayo)}}</td>
					     	<td>{{getTarro3($mix->Numero_Carga , $comparaensayo)}} <br> {{getVebe3($mix->Numero_Carga , $comparaensayo)}}</td>
					    
				     	@endif
				     	
				     	@endif
			
				     	

				     </tr>
				     
				     @endforeach
				     @endif


				     </tbody>

				</table>

				@else
				
				<p class="bg-danger text-center" style="height:40px;padding-top:10px"><b>Datos no encontrados . Por favor realize una nueva busqueda.</b></p>
				
				@endif

          @else

          <p class="bg-info text-center" style="height:40px;padding-top:10px"><b>Por favor realize una busqueda</b></p>
			
          @endif

				</div>
				
				{{--$mixer->render()--}}
			

			

				</div>
				
				</div>
			</div>
		</div>
	</div>
</div>{{--End Container--}}

{{--Modal busqueda en mixer--}}
<div class="remodal" data-remodal-id="buscarmixer_modal">
  <button data-remodal-action="close" class="remodal-close"></button>
  <h3 class="bg-success">Seleccione una fecha</h3>
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
  			<div class="form-group"> 
  			<p  class="bg-info">El sistema traera los registros que coincidan con esta fecha.</p>
  			</div>
  			
  			</form>

  		</div>

  </div>

  </div>
    
</div> {{--Modal busqueda en mixer--}}



{{--Modal busqueda de historial--}}
<div class="remodal" data-remodal-id="buscarhistorial_modal">
  <button data-remodal-action="close" class="remodal-close"></button>
  <h3 class="bg-success">Busqueda de historial</h3>
  <br>
  

  <div class="row">
  <div class="col-md-12">
  		<div class="col-md-6">
  			<form class="form-inline" method="post" action="/pc/vebe/carga/historial" >
  			<input name="_token" type="hidden" value="{!! csrf_token() !!}" />
  			<label>Numero de carga <input required  class="form-control" type="text" name="Parametro" placeholder="Numero de carga" /></label><button class="btn btn-success" style="margin-bottom:65px;">Buscar</button>
          </form>
       </div>


       <div class="col-md-6">
  			<form class="form-inline" method="post" action="/pc/vebe/fecha/historial">
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






{{--Modal Llenado de datos--}}

<div class="remodal" data-remodal-id="llenardatos_modal">
  <button data-remodal-action="close" class="remodal-close"></button>
  <h3 class="bg-success"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>&nbsp; Formulario</h3>
  <br>
  
  <div class="row">
  	<div class="col-md-12">
  		<form method="post" action="/pc/vebe"> 		
  		<input name="_token" type="hidden" value="{!! csrf_token() !!}" />
  
  	 <table class="table table-bordered" >
  		
  		<thead class="bg-success">
				      <tr>

				      <td ><input required=""  class="form-control datepicker" type="text" name="Fecha" placeholder="Ingrese fecha" style="cursor: pointer; background-color: white;"  required="" readonly=""  ></td>
				        <td >
                           
				         </td>
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
				         <td >
                           
				         </td>

				      </tr>
				      <tr>
				      <td ><input type="text" readonly="" name="Numero_Carga" id="numerocarga" class="form-control pull-left" ></td>
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
				        <option value="20">20</option>
				        <option value="25">25</option>
				       </select></td>

				 
				   </tr>


				   <tr>
				   	 <td><strong>Volumen</strong> </td>
				   	 <td>
				   	 	<input type="number" step="0.01" name="Volumen1" class="form-control" required="" placeholder="Digite volumen">

				   	 </td>

				   	 <td>
				   	 	<input type="number" step="0.01" name="Volumen2" class="form-control" required="" placeholder="Digite volumen">

				   	 </td>

				   	 <td>
				   	 	<input type="number" step="0.01" name="Volumen3" class="form-control" required="" placeholder="Digite volumen">

				   	 </td>

				   

				   </tr>

				   <tr>
				   	 <td><strong>Sensor de humedad</strong> </td>
				   	 <td>
				   	 	<input type="number" step="0.01" name="Humedad1" class="form-control" required="" placeholder="Digite humedad">

				   	 </td>

				   	 <td>
				   	 	<input type="number" step="0.01" name="Humedad2" class="form-control" required="" placeholder="Digite humedad">

				   	 </td>

				   	 <td>
				   	 	<input type="number" step="0.01" name="Humedad3" class="form-control" required="" placeholder="Digite humedad">

				   	 </td>

				   

				   </tr>

				   <tr>
				   	 <td><strong>Amperimetros</strong> </td>
				   	 <td>
				   	 	<input type="number" step="0.01" name="Amperimetro1" class="form-control" required="" placeholder="Digite Amperimetro">

				   	 </td>

				   	 <td>
				   	 	<input type="number" step="0.01" name="Amperimetro2" class="form-control" required="" placeholder="Digite Amperimetro">

				   	 </td>

				   	 <td>
				   	 	<input type="number" step="0.01" name="Amperimetro3" class="form-control" required="" placeholder="Digite Amperimetro">

				   	 </td>

				   

				   </tr>


				   <tr>
				   	 <td><strong>Vebe</strong> </td>
				   	 <td>
				   	 	<input type="number" step="0.01" name="Vebe1" class="form-control" required="" placeholder="Digite Vebe">

				   	 </td>

				   	 <td>
				   	 	<input type="number" step="0.01" name="Vebe2" class="form-control" required="" placeholder="Digite Vebe">

				   	 </td>

				   	 <td>
				   	 	<input type="number" step="0.01" name="Vebe3" class="form-control" required="" placeholder="Digite Vebe">

				   	 </td>

				   

				   </tr>



				     </tbody>


     	</table>

     
        <button type="submit" class="btn btn-success pull-right">Guardar</button>
       
      </form>
  	</div>	


       

</div>
</div>
{{--Modal Llenado de datos--}}


{{--Modal Info--}}
<div class="remodal" data-remodal-id="infovebe_modal">
  <button data-remodal-action="close" class="remodal-close"></button>
  <h3 class="bg-success">Funcionamiento</h3>
  <br>
  
  <div class="row">
  <div class="col-md-12">
  	<p class="text-justify">El sistema Vebe traéra los registros que coincidan con el parametro de busqueda especificado , pero ademas los registros serán filtrados para aquellos que contengan cualquiera de los siguientes codigo de elemento.

  	</p>	
  <div class="col-md-5 text-left">
  	<ul>
     
    <li>L20</li>
    <li>7T1/2-2T3/8</li>
    <li>7 Tor</li>
    <li>3/8</li>
    <li>LP25E</li>
    <li>03-02-10-L25</li>
    <li>L25W</li>
    <li>03-10-56-LE</li>
    <li>LP25E</li>
    <li>5T 1/2</li>
    <li>5t, 1/2.</li>


    


  	</ul>
  </div>	

  <div class="col-md-5 text-left">
  	<ul>
     
    <li>LP25E</li>
    <li>03-02-10-M</li>
    <li>03-10-56-LE</li>
    <li>03-02-09-Lex</li>
    <li>14122-08-Lex</li>
    <li>6 Tr / 3/8</li>
    <li>7t1/2,2t3/8.</li>
    <li>5t0.6</li>
    <li>5 T, 1/2</li>
    <li>6 Tr / 3/8</li>
    <li>5t1/2t</li>


  	</ul>
  </div>
  <br>

  </div>

<div class="col-md-12">
	<br>
  <p class="text-justify"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> En cuyo caso Vebe encuentre registros que coincidan con el parametro de la busqueda , pero dichos registros no poseen algun codigo de elemento previamente definido , vebe lo omitira.</p>
</div>

  </div>
    
</div> {{--Modal info--}}




@endsection

@section('script')

<script type="text/javascript">
	
$(document).ready(function(){

  $(".llenardatos").click(function() {
      
      
       var numerocarga = $(this).data('numerocarga');
    

       

       $('#numerocarga').val(numerocarga);

       


      });

  
      
      


    });


</script>



@endsection
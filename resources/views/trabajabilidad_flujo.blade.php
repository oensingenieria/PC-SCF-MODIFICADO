@extends('app')

@section('content')

<?php

 function existe($id){ 
    
    $exist = null;
    
    $sql ="SELECT * from revenimiento WHERE id_mixer = " . $id ;

    $resultado = connect_Mysql($sql);

    while($data = $resultado->fetch_assoc()){
    // $data es un arreglo asociativo con todos los campos que se pusieron en el select

       $exist =  $data['id'] ;
   
   }

    if($exist == null)
      {
       
       return false;

      }
      else
        return true ;

   }

   function connect_Mysql($sql){

     //realizo la conexion a la base de datos
    $db = new mysqli('localhost', 'pccompany', 'pccompany2015', 'iceberg');
    if($db->connect_errno > 0){
    die('Imposible conectar [' . $db->connect_error . ']');
    }


    //si falla la consulta
    if(!$resultado = $db->query($sql)){
    die('Ocurrio un error cargando el registro [' . $db->error . ']');
    }

    return $resultado;

   }

  ?>



<div class="container">
	<div class="row">
	<div class="col-md-12" style="margin-bottom:20px">
	
	<button class="btn btn-success" data-remodal-target="buscarmixer_modal" >Buscar ensayo</button>
	<button class="btn btn-success" data-remodal-target="buscarhistorial_modal" >Buscar historial</button>
	<input class="btn btn-info pull-right" style="background-color: #32C0AC;" type="button" value="Imprimir" onClick="window.print()">
	
	
	</div>
	

		<div class="col-md-12 ">
			<div class="panel panel-default">
				<div class="panel-heading text-center" ><b>{{$titlemesage}}</b></div>
				<div class="panel-body">
				
				<div class="row">
				<div class="col-md-12  ">
			@if(isset($mixer))	
				@if(!is_null($mixer) & count($mixer) > 0)	
				<table class="table table-bordered tablePag ">
 				
				   <thead class="bg-success " style="font-weight:bold" >
				      <tr>
				        <td>Acción</td>
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
				     
        <?php $empty = true;  ?>  
			 	@foreach($mixer as $mix)
				    
       @if(!existe($mix->id))
            <tr >
					 	<td><button data-carga="{{$mix->Numero_Carga}}" data-proyecto="{{$mix->Nombre_Proyecto}}" data-elemento="{{$mix->Nombre_Elemento}}"  data-volumen="{{$mix->Volumen_de_Carga}}"  data-idmixer="{{$mix->id}}"  data-cod="{{$mix->Codigo_Diseño}}" data-fecha="{{$mix->Fecha_de_Carga}}" class="btn btn-success llenardatos" data-remodal-target="llenardatos_modal" >Datos</button></td>


				     	<td>{{$mix->Numero_Carga}}</td>
				     	<td>{{$mix->Nombre_Proyecto}}</td>
				     	<td>{{$mix->Nombre_Elemento}}</td>
				     	<td></td>
				     	<td></td>
				     	<td></td>
				     	<td>{{$mix->Volumen_de_Carga}}</td>
				     	<td></td>
				     	<td></td>
			      </tr>
            <?php $empty = false; ?>
          @endif
				@endforeach

				     </tbody>

				</table>

        @if($empty)
         <tr ><td colspan="10" ><p class="bg-danger text-center" style="height:40px;padding-top:10px"><b>No se han encontrado ensayos pendientes con esos parametros . Favor verificar en " <a style="cursor:pointer" data-remodal-target="buscarhistorial_modal" >Ensayos Realizados</a> "</b></p></td> </tr >
       @endif 

        @else
				<p class="bg-danger text-center" style="height:40px;padding-top:10px"><b>No se han encontrado ensayos con ese parametro</b></p>
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
  <h3 class="bg-success">Buscar Ensayos Pendientes</h3>
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
  			
  				<form class="form-horizontal"  method="post" action="/pc/trabajabilidad_flujo/codigo">
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
  <h3 class="bg-success">Buscar Ensayos Realizados</h3>
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
         
  			<label>Fecha de Ensayo&nbsp;&nbsp;<input  type="text" name="Parametro"   style="cursor: pointer; background-color: white;"  required="" readonly=""  type="Text" class="form-control  datepicker"  placeholder="Ingrese una fecha" ></label>
      
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


{{--Modal Llenado de datos--}}
@if(isset($mixer))
<div class="remodal" data-remodal-id="llenardatos_modal">
  <button data-remodal-action="close" class="remodal-close"></button>
  <h4 style="color:#459645"><b>Realizar Ensayo</b></h4>
  <br>
  
  <form class="form-horizontal" method="post" action="/pc/trabajabilidad_flujo">
    <input name="_token" type="hidden" value="{!! csrf_token() !!}" />
  <div class="row">
  		<div class="col-md-6">
  		 

		  	<div class="form-group" >
		    <label  class="col-sm-6 control-label">ID:</label>
		    <div class="col-sm-6">
		      <input style="color:#459645" value="" name="idmixer"  id="id_mixer"  readonly="" type="number" class="form-control"  >
		    </div>
		  </div>

		  
		   <div class="form-group">
		    <label  class="col-sm-6 control-label">Numero de carga:</label>
		    <div class="col-sm-6">
		      <input style="color:#459645" value="" name="Numero_Carga"  id="Numero_Carga" readonly="" type="text" class="form-control"  >
		    </div>
		  </div>

		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-6 control-label">Nombre Proyecto</label>
		    <div class="col-sm-6">
		      <input style="color:#459645" type="text" class="form-control" name="Nombre_Proyecto" id="Nombre_Proyecto" readonly="" value="" placeholder="Elemento">
		    </div>
		   </div>
		 

		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-6 control-label">Nombre Elemento:</label>
		    <div class="col-sm-6">
		      <input style="color:#459645" type="text" class="form-control" name="Nombre_Elemento" id="Nombre_Elemento" readonly="" value=""  placeholder="Elemento">
		    </div>
		   </div>

       <?php date_default_timezone_set('America/Costa_Rica'); ?>

		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-6 control-label">Fecha de Registro:</label>
		    <div class="col-sm-6">
		      <input value="{{date ( 'Y-m-d' )}}"  name="Fecha_Registro" style="cursor: pointer; background-color: white; color:#459645"  required="" readonly=""  type="Text" class="form-control "   placeholder="Fecha">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="inputPassword3" class="col-sm-6 control-label">Hora de Registro:</label>
		    <div class="col-sm-6">
		      <input  type="text" required="" name="Hora_Registro" class="form-control timepicker" id="timepicker" placeholder="Hora">
		    </div>
		  </div>
		  
		 
		  
		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-6 control-label">Revenimiento (cm):</label>
		    <div class="col-sm-6">
		      <input type="number" step="0.01" name="Revenimiento" class="form-control" id="inputEmail3" placeholder="CM">
		    </div>
		  </div>

		  <input type="hidden" id="id_mixer" name="id_mixer">
      <input type="hidden" id="cod_diseño" name="Codigo_Diseño">
      <input type="hidden" id="fecha_ensayo" name="Fecha_Ensayo">

    
        <div class="form-group text-left" style="color:#459645">
         
         <input class="ensayoschk"  type="checkbox" name="vebe" value="1" checked>&nbsp;<b>Vebe</b>&nbsp;&nbsp;
         <input class="ensayoschk" type="checkbox" name="falla" value="1">&nbsp;<b>Falla 7 y 28</b>&nbsp;&nbsp;
     
       </div>

       <div class="form-group text-left" style="color:#459645">
       <input class="ensayoschk" type="checkbox" name="transferencia" value="1">&nbsp;<b>Transferencia</b>&nbsp;&nbsp;
       <input id="desechoschk" type="checkbox" name="desecho" value="1">&nbsp;<b>Desecho</b>&nbsp;&nbsp;
       </div>
  
  </div>


   <div class="col-md-6">
        
         <div class="form-group">
        <label for="inputEmail3" class="col-sm-6 control-label">Temperatura (°C):</label>
        <div class="col-sm-6">
          <input type="number" step="0.01" required="" name="Temperatura" class="form-control" id="inputEmail3" placeholder="Temperatura">
        </div>
      </div>
      
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-6 control-label">Volumen (m3): </label>
        <div class="col-sm-6">
          <input style="color:#459645" type="number" step="0.01" required=""  readonly="" name="Volumen" class="form-control" id="Volumen" >
        </div>
      </div>


        <div class="form-group">
        <label for="inputEmail3" class="col-sm-6 control-label">Zona: </label>
        <div class="col-sm-6">
          
          <select class="form-control" name="Zona">
          <option value="Zona_1">Zona 1 - 2</option>
          <option value="Zona_2">Zona 3 - 4</option>
          <option value="Zona_3">Zona 5 - 6</option>
          <option value="Zona_4">Zona 7 - 8</option>
          <option value="Zona_5">Zona Patio</option>
          
        </select>

        </div>
      </div>
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-6 control-label">Encargado: </label>
        <div class="col-sm-6">
          
          <select name="Encargado" class="form-control" >
            @foreach($encargados as $encargado)
            <option value="{{$encargado->nombre}}" > {{$encargado->nombre}} </option>
            @endforeach
          </select>


        </div>
      </div>
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-6 control-label">Cod. Tarro: </label>
        <div class="col-sm-6">

           <select name="Codigo_Tarro" class="form-control" >
            @foreach($tarros as $tarro)
            <option value="{{$tarro->codigo}}" > {{$tarro->codigo}} </option>
            @endforeach
          </select>

        </div>
      </div>
      <div class="form-group">
        <label for="inputEmail3" class="col-sm-6 control-label">Observaciones: </label>
        <div class="col-sm-6">
          
          <textarea  overflow: auto; wrap="off" rows="2" placeholder="Observacion" style="white-space: normal ; width:100%" class="form-control" name="Observaciones">
            

          </textarea>
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-offset-6 col-sm-6">
         
          <button type="submit" class="btn btn-success">Grabar</button>
           
        </div>
      </div>

       </div>
     </div>

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
      
       var carga = $(this).data('carga');
       var proyecto = $(this).data('proyecto');
       var elemento = $(this).data('elemento');
       var volumen = $(this).data('volumen');
       var id_mixer = $(this).data('idmixer');
       var cod = $(this).data('cod');
       var fecha = $(this).data('fecha');


      

       $('#Numero_Carga').val(carga);
       $('#Nombre_Proyecto').val(proyecto);
       $('#Nombre_Elemento').val(elemento);
       $('#Volumen').val(volumen);
       $('#id_mixer').val(id_mixer);
       $('#cod_diseño').val(cod);
       $('#fecha_ensayo').val(fecha);


      });

//checkbox logic
    $('#desechoschk').on('change', function() {
    
    $('.ensayoschk').not(this).prop('checked', false);  
     });

    $('.ensayoschk').on('change', function() {
    
    $('#desechoschk').not(this).prop('checked', false);  
     });

//checkbox logic
    

    });


</script>



@endsection
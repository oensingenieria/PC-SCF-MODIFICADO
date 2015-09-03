@extends('app')



@section('content')

<?php
    function getpromediomin($array , $codigo ){ 
    
    
    
    foreach($array as $arreglo){
    	
    	if( $arreglo->Codigo_Diseño == $codigo){
      		
      		return $arreglo->Resis_Promedio;

    	}

    }
    
  return 0;


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


<style type="text/css">
	
.buttonnavlef:hover{
font-weight: bold;

}


</style>



<div class="row" style="margin-bottom:20px">
	<div class="col-md-12">
	
	<div class="col-md-2">
    </div>


	<div class="col-md-10">
	<div class="col-md-5">

	<form class="form-inline" method="post" action="/pc/reportes/resistencia">
	<input name="_token" type="hidden" value="{!! csrf_token() !!}" />
		
		<input placeholder="Ingrese una fecha" required name="fecha"  style="cursor: pointer; background-color: white;"  type="text" class="form-control datepicker">
		<button type="submit" class="btn btn-success" style="background-color: rgb(32, 62, 155);border-color: rgb(32, 62, 155);">Buscar</button>

	</form>


    </div>	


    <div class="col-md-5">

	<form class="form-inline">
	<input name="_token" type="hidden" value="{!! csrf_token() !!}" />
		
		<input type="text" class="form-control" placeholder="Seleccione un mes">
		<button type="submit" class="btn btn-success" style="background-color: rgb(32, 62, 155);border-color: rgb(32, 62, 155);">Buscar</button>

	</form>


    </div>



	</div>
	</div>

	</div>



<div class="row">
	<div class="col-md-12">
		

	 <div class="col-md-2" >
	 
	 
	    
	   
	 	<a class="btn btn-info  btn-block buttonnavlef" style="background-color: #FFF;border-color: rgb(32, 62, 155);margin-bottom: 10px;color: blue; " href="/pc/reportes/resistencia" >Resistencia</a>
	 	

	 	
	 	<a class="btn btn-info btn-block buttonnavlef" style="background-color: rgb(32, 62, 155);border-color: rgb(32, 62, 155); margin-bottom:10px" href="/pc/reportes/consumo/agregado">Consumo Agregado</a>
	 	

	 		
	 	<a class="btn btn-info btn-block buttonnavlef" style="background-color: rgb(32, 62, 155);border-color: rgb(32, 62, 155); margin-bottom:10px" href="/pc/reportes/consumo/cemento">Consumo Cemento</a>
	 	

	 	
	 	<a class="btn btn-info btn-block buttonnavlef" style="background-color: rgb(32, 62, 155);border-color: rgb(32, 62, 155); margin-bottom:10px" href="/pc/reportes/desechos">Desecho</a>
	 	
	 
   
	 

	 </div>	



	  <div class="col-md-10">
	 	
 
	  <table class="table table-hover text-center">
	  	
	  <thead class="text-center">
	  	
	  <tr style="background-color:rgb(32, 62, 155); color: white;font-weight: bold;">
	  <td colspan="2" >Enero</td>
	  <td colspan="2">Transferencia</td>
	  <td colspan="2">7 Dias </td>
	  <td colspan="2">28 Dias</td>
	  </tr>

	  </thead>

	  <tbody class="text-center">
	  	
	  <tr style="background-color:rgb(32, 62, 155); color: white;">
	  <td>Diseño</td>
	  <td>Resist. Nominal</td>
	  <td rowspan="2" style="vertical-align: middle;">Min</td>
	  <td rowspan="2" style="vertical-align: middle;">Max</td>
	  <td rowspan="2" style="vertical-align: middle;">Min</td>
	  <td rowspan="2" style="vertical-align: middle;">Max</td>
	  <td rowspan="2" style="vertical-align: middle;">Min</td>
	  <td rowspan="2" style="vertical-align: middle;">Max</td>
	   </tr>

	   <tr style="background-color:rgb(32, 62, 155); color: white;">
	  <td>Tipo concreto</td>
	  <td>kg/cm2</td>
	  
	   </tr>


	   <tr >
	  <td>CAD 280</td>
	  <td>100/280</td>
	  <td >50</td>
	  <td >20</td>
	  <td >@if(isset($fallas7))  {{ getpromediomin($fallas7,'10017207') }}  @else 40  @endif</td>
	  <td >@if(isset($fallas7)) {{getpromediomin($fallas7,'10017207')}} @else 0  @endif</td>
	  <td >20</td>
	  <td >45</td>
	  </tr>


	  <tr >
	  <td>CAD 350</td>
	  <td>100/350</td>
	  <td >35</td>
	  <td >50</td>
	  <td >@if(isset($fallas7)) {{getpromediomin($fallas7,'10017280')}} @else 10  @endif</td>
	  <td >@if(isset($fallas7)) {{getpromediomin($fallas7,'10017280')}} @else 40  @endif</td>
	  <td >20</td>
	  <td >50</td>
	  </tr>


	  <tr >
	  <td>Auto 350</td>
	  <td>100/350</td>
	  <td >50</td>
	  <td >35</td>
	  <td >@if(isset($fallas7)) {{getpromediomin($fallas7,'10017208-Auto')}} @else 0  @endif</td>
	  <td >@if(isset($fallas7)) {{getpromediomin($fallas7,'10017208-Auto')}} @else 40  @endif</td>
	  <td >50</td>
	  <td >80</td>
	  </tr>

	  <tr >
	  <td>Auto 550</td>
	  <td>175/550</td>
	  <td >45</td>
	  <td >70</td>
	  <td >@if(isset($fallas7)) {{getpromediomin($fallas7,'10017209')}} @else 0  @endif</td>
	  <td >@if(isset($fallas7)) {{getpromediomin($fallas7,'10017209')}} @else 10  @endif</td>
	  <td >80</td>
	  <td >35</td>
	  </tr>


	  <tr >
	  <td>CAD 700</td>
	  <td>280/700</td>
	  <td >50</td>
	  <td >50</td>
	  <td >@if(isset($fallas7)) {{getpromediomin($fallas7,'10017423')}} @else 0  @endif</td>
	  <td >@if(isset($fallas7)) {{getpromediomin($fallas7,'10017423')}} @else 10  @endif</td>
	  <td >80</td>
	  <td >70</td>
	  </tr>


	  <tr >
	  <td>Auto 700</td>
	  <td>280/700</td>
	  <td >15</td>
	  <td >50</td>
	  <td >@if(isset($fallas7)) {{getpromediomin($fallas7,'07112007')}} @else 50  @endif</td>
	  <td >@if(isset($fallas7)) {{getpromediomin($fallas7,'07112007')}} @else 5  @endif</td>
	  <td >50</td>
	  <td >70</td>
	  </tr>


	  <tr >
	  <td>Postes</td>
	  <td>300/420</td>
	  <td >15</td>
	  <td >50</td>
	  <td >@if(isset($fallas7)) {{getpromediomin($fallas7,'Postes08')}} @else 50  @endif</td>
	  <td >@if(isset($fallas7)) {{getpromediomin($fallas7,'Postes08')}} @else 5  @endif</td>
	  <td >70</td>
	  <td >50</td>
	  </tr>

	  <tr >
	  <td>Tensyland prueba</td>
	  <td>320/420</td>
	  <td >15</td>
	  <td >45</td>
	  <td >10 </td>
	  <td >50</td>
	  <td >25</td>
	  <td >50</td>
	  </tr>


	  <tr >
	  <td>Elematic</td>
	  <td>320/420</td>
	  <td >50</td>
	  <td >45</td>
	  <td >10 </td>
	  <td >45</td>
	  <td >25</td>
	  <td >50</td>
	  </tr>
	 

	 




	  </tbody>


	  </table>


 


	 </div>	




	</div>



	<div class="col-md-12">

	
	
		<div class="col-md-4">
		<h3>Transferencias</h3>
<canvas id="chart-area4" width="50" height="50"></canvas>
		</div>

		<div class="col-md-4">
		<h3>Falla 7</h3>
<canvas id="chart-area" width="300" height="300"></canvas>
		</div>

		<div class="col-md-4">
		<h3>Falla 28</h3>
<canvas id="chart-area3" width="50" height="50"></canvas>
		</div>


	


	</div>

<script>
var pieData = [{value: 40,color:"#0b82e7",highlight: "#0c62ab",label: "Google Chrome"},
				{
					value: 16,
					color: "#e3e860",
					highlight: "#a9ad47",
					label: "Android"
				},
				{
					value: 11,
					color: "#eb5d82",
					highlight: "#b74865",
					label: "Firefox"
				},
				{
					value: 10,
					color: "#5ae85a",
					highlight: "#42a642",
					label: "Internet Explorer"
				},
				{
					value: 8.6,
					color: "#e965db",
					highlight: "#a6429b",
					label: "Safari"
				}
			];

	var barChartData = {
		labels : ["CAD 280","CAD 350","Auto 350","Auto 550","CAD 700","Auto 700","Postes"],
		datasets : [
			{
				fillColor : "#6b9dfa",
				strokeColor : "#ffffff",
				highlightFill: "#1864f2",
				highlightStroke: "#ffffff",
				data : [90,30,10,80,15,5,15]
			},
			{
				fillColor : "#e9e225",
				strokeColor : "#ffffff",
				highlightFill : "#ee7f49",
				highlightStroke : "#ffffff",
				data : [40,50,70,40,85,55,15]
			}
		]

	}	
		var lineChartData = {
			labels : ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio"],
			datasets : [
				{
					label: "Primera serie de datos",
					fillColor : "rgba(220,220,220,0.2)",
					strokeColor : "#6b9dfa",
					pointColor : "#1e45d7",
					pointStrokeColor : "#fff",
					pointHighlightFill : "#fff",
					pointHighlightStroke : "rgba(220,220,220,1)",
					data : [90,30,10,80,15,5,15]
				},
				{
					label: "Segunda serie de datos",
					fillColor : "rgba(151,187,205,0.2)",
					strokeColor : "#e9e225",
					pointColor : "#faab12",
					pointStrokeColor : "#fff",
					pointHighlightFill : "#fff",
					pointHighlightStroke : "rgba(151,187,205,1)",
					data : [40,50,70,40,85,55,15]
				}
			]

		}
var ctx = document.getElementById("chart-area").getContext("2d");
//var ctx2 = document.getElementById("chart-area2").getContext("2d");
var ctx3 = document.getElementById("chart-area3").getContext("2d");
var ctx4 = document.getElementById("chart-area4").getContext("2d");
window.myPie = new Chart(ctx).Bar(barChartData, {responsive:true});	
//window.myPie = new Chart(ctx2).Doughnut(pieData);				
window.myPie = new Chart(ctx3).Bar(barChartData, {responsive:true});
window.myPie = new Chart(ctx4).Bar(barChartData, {responsive:true});
</script>




</div>






@endsection
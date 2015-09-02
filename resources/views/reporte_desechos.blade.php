@extends('app')



@section('content')



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
	 
	 
	    
	   
	 	<a class="btn btn-info  btn-block buttonnavlef" style="background-color: rgb(32, 62, 155);border-color: rgb(32, 62, 155); margin-bottom:10px" href="/pc/reportes/resistencia">Resistencia</a>
	 	

	 	
	 	<a class="btn btn-info btn-block buttonnavlef" style="background-color: rgb(32, 62, 155);border-color: rgb(32, 62, 155); margin-bottom:10px" href="/pc/reportes/consumo/agregado">Consumo Agregado</a>
	 	

	 		
	 	<a class="btn btn-info btn-block buttonnavlef" style="background-color: rgb(32, 62, 155);border-color: rgb(32, 62, 155); margin-bottom:10px" href="/pc/reportes/consumo/cemento">Consumo Cemento</a>
	 	

	 	
	 	<a class="btn btn-info btn-block buttonnavlef" style="background-color: #FFF;border-color: rgb(32, 62, 155);margin-bottom: 10px;color: blue; " href="/pc/reportes/desechos">Desecho</a>
	 	
	 
   
	 

	 </div>	



	  <div class="col-md-10">
	 	
 
	  <table class="table table-hover text-center">
	  	
	  <thead class="text-center">
	  	
	  <tr style="background-color:rgb(32, 62, 155); color: white;font-weight: bold;">
	  <td  >Descripcion</td>
	  <td>Volumen Producido</td>
	  <td >Volumen fuera de revenimiento</td>
	  <td >% fuera de trabajabilidad</td>
	  <td >Volumen desechado</td>
	  <td >% de desecho</td>
	  </tr>

	  </thead>

	  <tbody class="text-center">
	  	
	  

	  


	   <tr >
	  <td>Enero</td>
	  <td>5</td>
	  <td >10</td>
	  <td >60</td>
	  <td >15%</td>
	  <td >30</td>
	  
	  </tr>

	  <tr >
	  <td>Febrero</td>
	  <td>15</td>
	  <td >10</td>
	  <td >30</td>
	  <td >5%</td>
	  <td >60</td>
	  
	  </tr>


<tr >
	  <td>Marzo</td>
	  <td>10</td>
	  <td >15</td>
	  <td >60</td>
	  <td >5%</td>
	  <td >30</td>
	  
	  </tr>


<tr >
	  <td>Abril</td>
	  <td>0</td>
	  <td >5</td>
	  <td >15</td>
	  <td >30%</td>
	  <td >40</td>
	  
	  </tr>


<tr >
	  <td>Mayo</td>
	  <td>30</td>
	  <td >8</td>
	  <td >15</td>
	  <td >10%</td>
	  <td >50</td>
	  
	  </tr>


<tr >
	  <td>Junio</td>
	  <td>15</td>
	  <td >30</td>
	  <td >5</td>
	  <td >10%</td>5
	  <td >40</td>
	  
	  </tr>


<tr >
	  <td>Julio</td>
	  <td>50</td>
	  <td >30</td>
	  <td >5</td>
	  <td >30%</td>
	  <td >40</td>
	  
	  </tr>


<tr >
	  <td>Agosto</td>
	  <td>20</td>
	  <td >30</td>
	  <td >40</td>
	  <td >50%</td>
	  <td >30</td>
	  
	  </tr>


<tr >
	  <td>Septiembre</td>
	  <td>15</td>
	  <td >8</td>
	  <td >20</td>
	  <td >40%</td>
	  <td >30</td>
	  
	  </tr>


<tr >
	  <td>Octubre</td>
	  <td>15</td>
	  <td >30</td>
	  <td >20</td>
	  <td >10%</td>
	  <td >30</td>
	  
	  </tr>


<tr >
	  <td>Noviembre</td>
	  <td>18</td>
	  <td >15</td>
	  <td >30</td>
	  <td >20%</td>
	  <td >10</td>
	  
	  </tr>


<tr >
	  <td>Diciembre</td>
	  <td>10</td>
	  <td >30</td>
	  <td >9</td>
	  <td >15%</td>
	  <td >10</td>
	  
	  </tr>





	  </tbody>


	  </table>


 


	 </div>	


	</div>



	<div class="col-md-12">

	
	
		<div class="col-md-3">
		<h3>Volumen Prod.</h3>
<canvas id="chart-area4" width="50" height="50"></canvas>
		</div>

		<div class="col-md-3">
		<h3>Volumen fuera</h3>
<canvas id="chart-area" width="300" height="300"></canvas>
		</div>

		<div class="col-md-3">
		<h3>% fuera </h3>
<canvas id="chart-area3" width="50" height="50"></canvas>
		</div>

		<div class="col-md-3">
		<h3>% de desecho</h3>
<canvas id="chart-area2" width="50" height="50"></canvas>
		</div>


	


	</div>

<script>

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
var ctx2 = document.getElementById("chart-area2").getContext("2d");
var ctx3 = document.getElementById("chart-area3").getContext("2d");
var ctx4 = document.getElementById("chart-area4").getContext("2d");
window.myPie = new Chart(ctx).Line(lineChartData, {responsive:true});	
window.myPie = new Chart(ctx2).Line(lineChartData, {responsive:true});				
window.myPie = new Chart(ctx3).Line(lineChartData, {responsive:true});
window.myPie = new Chart(ctx4).Line(lineChartData, {responsive:true});
</script>









</div>






@endsection
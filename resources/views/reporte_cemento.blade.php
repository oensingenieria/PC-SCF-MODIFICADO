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
	 
	 
	    
	   
	 	<a class="btn btn-info  btn-block buttonnavlef" style="background-color: rgb(32, 62, 155);border-color: rgb(32, 62, 155); margin-bottom:10px" href="/pc/reportes/resistencia" href="/pc/reportes/resistencia">Resistencia</a>
	 	

	 	
	 	<a class="btn btn-info btn-block buttonnavlef" style="background-color: rgb(32, 62, 155);border-color: rgb(32, 62, 155); margin-bottom:10px " href="/pc/reportes/consumo/agregado">Consumo Agregado</a>
	 	

	 		
	 	<a class="btn btn-info btn-block buttonnavlef" style="background-color: #FFF;border-color: rgb(32, 62, 155);margin-bottom: 10px;color: blue;" href="/pc/reportes/consumo/cemento">Consumo Cemento</a>
	 	

	 	
	 	<a class="btn btn-info btn-block buttonnavlef" style="background-color: rgb(32, 62, 155);border-color: rgb(32, 62, 155); margin-bottom:10px" href="/pc/reportes/desechos">Desecho</a>
	 	
	 
   
	 

	 </div>	



	  <div class="col-md-10">
	 	
 
	  <table class="table table-hover text-center">
	  	
	  <thead class="text-center">
	  	
	  <tr style="background-color:rgb(32, 62, 155); color: white;font-weight: bold;">
	  <td  >Elemento</td>
	  <td>Consumo Cemento del mes (kg)</td>
	  <td >Vol. Mensual (m3)</td>
	  <td >Consumo unid. Promdio (kg/m3)</td>
	  <td >Consumo acumulador del año (kg)</td>
	  </tr>

	  </thead>

	  <tbody class="text-center">
	  	
	  

	  


	   <tr >
	  <td>Postes</td>
	  <td>50</td>
	  <td >80</td>
	  <td >15</td>
	  <td >23</td>
	  
	  </tr>


	  <tr >
	  <td>Viguetas</td>
	 <td>10</td>
	  <td >15</td>
	  <td >40</td>
	  <td >15</td>
	  
	  </tr>


	  <tr >
	  <td>Losalex</td>
	  <td>30</td>
	  <td >50</td>
	  <td >15</td>
	  <td >65</td>
	  
	  </tr>

	  <tr >
	  <td>Proyectos</td>
	  <td>10</td>
	  <td >60</td>
	  <td >30</td>
	  <td >15</td>
	  
	  </tr>

	  
	  </tbody>


	  </table>


 


	 </div>	




	</div>



	<div class="col-md-12">

	
	
		<div class="col-md-3">
		<h3>Consumo C. Mes (kg)</h3>
<canvas id="chart-area4" width="50" height="50"></canvas>
		</div>

		<div class="col-md-3">
		<h3>Vol. Mes (m3)</h3>
<canvas id="chart-area" width="300" height="300"></canvas>
		</div>

		<div class="col-md-3">
		<h3>Consumo unid. Pro. (kg/m3)</h3>
<canvas id="chart-area3" width="50" height="50"></canvas>
		</div>

		<div class="col-md-3">
		<h3>Consumo acum. año(kg)</h3>
<canvas id="chart-area2" width="50" height="50"></canvas>
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
		labels : ["Postes","Viguetas","Losalex","Proyectos"],
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
			labels : ["Postes","Viguetas","Losalex","Proyectos"],
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
window.myPie = new Chart(ctx3).Bar(barChartData, {responsive:true});
window.myPie = new Chart(ctx4).Bar(barChartData, {responsive:true});
</script>











</div>






@endsection
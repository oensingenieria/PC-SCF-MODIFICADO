@extends('app')



@section('content')



<style type="text/css">
	
.buttonnavlef:hover{
font-weight: bold;

}


</style>


<div class="row">
	<div class="col-md-12">
		

	 <div class="col-md-2" >
	 
	 
	    
	   
	 	<a class="btn btn-info  btn-block buttonnavlef" style="background-color: rgb(32, 62, 155);border-color: rgb(32, 62, 155); margin-bottom:10px ; " href="/pc/reportes/resistencia">Resistencia</a>
	 	

	 	
	 	<a class="btn btn-info btn-block buttonnavlef" style="background-color: rgb(32, 62, 155);border-color: rgb(32, 62, 155); margin-bottom:10px" href="/pc/reportes/consumo/agregado">Consumo Agregado</a>
	 	

	 		
	 	<a class="btn btn-info btn-block buttonnavlef" style="background-color: rgb(32, 62, 155);border-color: rgb(32, 62, 155); margin-bottom:10px" href="/pc/reportes/consumo/cemento">Consumo Cemento</a>
	 	

	 	
	 	<a class="btn btn-info btn-block buttonnavlef" style="background-color: rgb(32, 62, 155);border-color: rgb(32, 62, 155); margin-bottom:10px" href="/pc/reportes/desechos">Desecho</a>
	 	
	 
   
	 

	 </div>	



	  <div class="col-md-10">


	  

 <h4 class="bg-info text-center " style="paddin-top:20px;padding-bottom:20px;"><b>Bienvenido a Reportes</b></h4>

 


	 </div>	




	</div>


</div>






@endsection
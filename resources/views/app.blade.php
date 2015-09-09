<?php set_time_limit(0); ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ENSAYOS | PC</title>

	<link href="/css/app.css" rel="stylesheet">

	<link rel="stylesheet" href="/css/remodal.css">
    <link rel="stylesheet" href="/css/remodal-default-theme.css">

    <link rel="stylesheet" href="/css/datepicker.css">
    <link rel="stylesheet" href="/timepick/jquery.timepicker.css">
    <link rel="stylesheet" href="/Paginate/jquery.dataTables.min.css">

    <link rel="stylesheet" type="text/css" href="/css/sweetalert.css">

   <!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
    

	<style type="text/css">
	 #navitem li a{
     color: #203E9B;
	}

	#navpc{
	color: #203E90;
    font-weight: 700;
	}

	.pagination {list-style:none; margin:0px; padding:0px;}  
    .pagination li{float:left; margin:3px;}  
    .pagination li a{   display:block; padding:3px 5px; color:#fff; background-color:#44b0dd; text-decoration:none;}  
    .pagination li a.active {border:1px solid #000; color:#000; background-color:#fff;}  
    .pagination li a.inactive {background-color:#eee; color:#777; border:1px solid #ccc;}  

	</style>

	<link rel="icon" type="image/png" href="/logo.png" />

	@yield('link')
</head>
<body>
  @if (!Auth::guest())
       <div class="row">
			<img src="/banner.png">
		</div> 
@endif 

	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" id="navpc" class="btn btn-primary" href="/">PC</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				
				@if (!Auth::guest())
				
				<ul class="nav navbar-nav navbar-left" id="navitem">
                 <li ><a style="color:grey" href="#"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;Planificacion</a></li>
					<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-eye-open"></span>&nbsp;Ensayo <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="/pc/trabajabilidad_flujo"><span class="glyphicon glyphicon-ok-circle "></span>&nbsp;Trabajabilidad y Flujo</a></li>
								<li><a href="/pc/yield"><span class="glyphicon glyphicon-ok-circle "></span>&nbsp;Yield</a></li>
								<li><a href="/pc/vebe"><span class="glyphicon glyphicon-ok-circle "></span>&nbsp;Vebe</a></li>
								<li><a href="/pc/transferencias"><span class="glyphicon glyphicon-ok-circle "></span>&nbsp;Transferencias</a></li>
								<li><a href="/pc/falla7"><span class="glyphicon glyphicon-ok-circle "></span>&nbsp;Falla 7</a></li>
								<li><a href="/pc/falla28"><span class="glyphicon glyphicon-ok-circle "></span>&nbsp;Falla 28</a></li>
								
							</ul>
						
					<li><a href="/graficas/reportes/index.php"><span class="glyphicon glyphicon-edit"></span>&nbsp;Reportes</a></li>
					<li><a style="color:grey" href="#"><span class="glyphicon glyphicon-stats"></span>&nbsp;Estadistica</a></li>
					<li><a style="color:grey" href="#"><span class="glyphicon glyphicon-star"></span>&nbsp;Mixer</a></li>
                 </ul>
				
				@endif

				<ul class="nav navbar-nav navbar-right">
					@if (Auth::guest())
						<li><a href="/auth/login"><span class="glyphicon glyphicon-user"></span>&nbsp;Iniciar Sessión</a></li>
					@else

					

						<li class="dropdown">
							<a  href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-user" style="color:blue"></span>&nbsp;{{ Auth::user()->username }} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu"  id="navitem">
							
								<li><a href="/auth/logout">Salir</a></li>
							</ul>
						</li>
					@endif
				</ul>
			</div>
		</div>
	</nav>
       @if (Auth::guest())
       <div class="row">
			<div align="center" class="col-md-12" style="background-color:#ebba00;padding: 50px;color:white;font-size: 30px ; margin-top:-20px">Sistema de Control de Calidad</div>
		</div> 
		@endif 

	    @if(Session::has('success'))
    
          <input type="hidden" class="success" value="{{ Session::get('success') }}" >
    
            @endif

            @if(Session::has('badRequest'))
    
        <input type="hidden" class="badRequest" value="{{ Session::get('badRequest') }}">
  
            @endif


	@yield('content')


   <br><br>
   <div class="container">
	<footer class="text-center " >
	<div class="container text-muted">
		<p><h4>Copyright © 2015 OENS Ingeniería C.R.T 312016134701 </h3></p>
        <p><h4>Desarrollado para: Productos de Concreto, S.A Todos los Derechos Reservados</h4></p>
     </div>   
	</footer>
	</div>
	



	<!-- Scripts -->
	<script src="/js/jquery.js"></script>
	<script src="/js/bootstrap.min.js"></script>

	<script src="/js/remodal.min.js"></script>
	<script src="/js/Chart.js"></script>

	<script src="/js/jquery-ui.js"></script>
	<script src="/timepick/jquery.timepicker.min.js"></script>

	<script src="/paginate/jquery.dataTables.min.js"></script>  
 
	<script src="/js/sweetalert.min.js"></script>
    

     @yield('script')

	<script type="text/javascript">

	 $(function() {
          $.datepicker.setDefaults($.datepicker.regional["es"]);
          $( ".datepicker" ).datepicker(

          {
            dateFormat: 'yy-mm-dd',
            firstDay: 1,
            onSelect: function (date) {
           $('input[name=date]').val(date)
      },

          });

        });


$('.timepicker').timepicker({ 'timeFormat': 'H:i:s' });
$('.setTime').on('click', function (){
    $('.timepicker').timepicker('setTime', new Date());
});


$(document).ready(function(){
    if($('.badRequest').length){ 
     var msj = $('.badRequest').val();

      swal({   
      title: msj ,  
      text: "©PC",  
      timer: 2300,  
      showConfirmButton: false,
      type: "error" 
         });

    }



   if($('.success').length){ 
    var msj = $('.success').val();

    swal({   
      title: msj ,  
      text: "©PC",  
      timer: 2300,  
      showConfirmButton: false,
      type: "success" 
         });

}

 $(".tablePag").DataTable();



});

   $( "#cargarmixerdata" ).click(function() {

       swal({
  title: "¿Estás seguro?",
  text: "El sistema cargará la información de este día",
  type: "warning",
  showCancelButton: true,
  confirmButtonColor: "#DD6B55",
  confirmButtonText: "Cargar datos ahora",
  cancelButtonText: "Cancelar",
  closeOnConfirm: true,
  closeOnCancel: false
},
function(isConfirm){
  if (isConfirm) {

    location.href='/pc/getdata/excel/loadmixer';
    
  } else {
      swal("Cancelado", "", "error");
  }
});

        });


	 </script>

	
</body>
</html>

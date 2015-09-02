<!DOCTYPE html>
<?php
include_once '../configuracion/path.php';
include_once $PATH . 'controlador/control/Control.class.php';
include_once $PATH . 'configuracion/parametros.php';
?>
<html lang="en">
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" true/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <title><?php echo Parametro::$NOMBRE_SITIO ?></title>
        <link rel="stylesheet" type="text/css" href="../publico/css/jAlert/jAlert-v2.css" />
        <link rel="stylesheet" type="text/css" href="../publico/css/bootstrap/bootstrap-responsive.css" />
        <link rel="stylesheet" type="text/css" href="../publico/css/bootstrap/bootstrap-nav-wizard.css" >
        <link rel="stylesheet" type="text/css" href="../publico/css/validacion/jQuery-validacion.css" >
        <link rel="stylesheet" type="text/css" href="../publico/css/jquery-ui.css" />
        <link rel="stylesheet" type="text/css" href="../publico/css/bootstrap/bootstrap.css" >
        <link rel="stylesheet" type="text/css" href="../publico/css/datepicker/daterangepicker-bs3.css"/>
        <link rel="stylesheet" type="text/css" href="../publico/css/style.css"/>
        <link href="/css/app.css" rel="stylesheet">
   
    <style type="text/css">
     #navitem li a{
     color: #203E9B;
    }

    #navpc{
    color: #203E90;
    font-weight: 700;
    }

    </style>

    <link rel="icon" type="image/png" href="/logo.png" />


    </head>


       <div class="row">
            <img src="/banner.png">
        </div> 
     

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
                 
            </div>
        </div>
    </nav>


    <body>
        <div class="col-lg-12" style="margin-top: 75px;">
            <div class="col-lg-2">
                <a href="#" id="resistencia" class="boton_reportes btn btn-success btn-ms" >Resistencia</a>
                <br>
                <a href="#" id="cagregado" class="boton_reportes btn btn-success btn-ms">Consumo Agregado</a>
                <br>
                <a href="#" id="ccemento" class="boton_reportes btn btn-success btn-ms" >Consumo Cemento</a>
                <br>
                <a href="#" id="" class="boton_reportes btn btn-success btn-ms">Desecho</a>
                <br>
                <a href="#" id="" class="boton_reportes btn btn-success btn-ms">% de Trabajabilidad</a>
                <br>
                <a href="#" id="" class="boton_reportes btn btn-success btn-ms">Toneladas Producidas</a>
                <br>
            </div>
            <div class="col-lg-10" id="contenido">
                <div class="bv_reportes">Bienvenido a Reportes</div>
            </div>
        </div>
        <br><br>
    <div class="container">
    <footer class="text-center " >
    <div class="container text-muted">
        <p><h4>Copyright © 2015 OENS Ingeniería C.R.T 312016134701 </h3></p>
        <p><h4>Desarrollado para: Productos de Concreto, S.A Todos los Derechos Reservados</h4></p>
     </div>   
    </footer>
    </div>
    <br>
    <!-- jQuery Version 1.11.0 -->
    <script type="text/javascript" src="../publico/js/jquery-1.11.0.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script type="text/javascript" src="../publico/js/bootstrap/bootstrap.min.js"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script type="text/javascript" src="../publico/js/plugins/metisMenu/metisMenu.min.js"></script>
    <!--Funciones de Administrador -->
    <link rel="stylesheet" type="text/css" href="../publico/css/style.css" />
    <script type="text/javascript" src="../publico/js/script.js"></script>
    <!--Fin Funciones de Administrador -->
    <!-- Custom Theme JavaScript -->
    <script type="text/javascript" src="../publico/js/sb-admin-2.js"></script>
    <script type="text/javascript" src="../publico/js/bootstrap/bootstrap-filestyle.js"></script>
    <script type="text/javascript" src="../publico/js/bootstrap/jquery.maskedinput.js"></script>
    <script type="text/javascript" src="../publico/js/switch/bootstrap-switch.js"></script>
    <script type="text/javascript" src="../publico/js/jAlert/jAlert-v2.js"></script>
    <script type="text/javascript" src="../publico/js/galeria/jquery.gallery.js"></script>
    <script type="text/javascript" src="../publico/js/datepicker/moment.min.js"></script>
    <script type="text/javascript" src="../publico/js/datepicker/daterangepicker.js"></script>
    <script type="text/javascript" src="../publico/js/jquery-ui.js"></script>
    <script type="text/javascript" src="../publico/js/galeria/modernizr.custom.53451.js"></script>
    <!-- Custom Theme JavaScript -->
    <script type="text/javascript" src="../publico/js/funciones.js"></script>


    <script type="text/javascript" src="../publico/js/highcharts.js"></script>
    <script type="text/javascript" src="../publico/js/modules/data.js"></script>
    <script type="text/javascript" src="../publico/js/modules/exporting.js"></script>

</body>
</html>

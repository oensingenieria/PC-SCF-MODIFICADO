<!DOCTYPE html>
<?php
include_once 'configuracion/path.php';
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
        <link rel="stylesheet" type="text/css" href="publico/css/jAlert/jAlert-v2.css" />
        <link rel="stylesheet" type="text/css" href="publico/css/bootstrap/bootstrap-responsive.css" />
        <link rel="stylesheet" type="text/css" href="publico/css/bootstrap/bootstrap-nav-wizard.css" >
        <link rel="stylesheet" type="text/css" href="publico/css/validacion/jQuery-validacion.css" >
        <link rel="stylesheet" type="text/css" href="publico/css/jquery-ui.css" />
        <link rel="stylesheet" type="text/css" href="publico/css/bootstrap/bootstrap.css" >
        <link rel="stylesheet" type="text/css" href="publico/css/datepicker/daterangepicker-bs3.css"/>
        <link rel="stylesheet" type="text/css" href="publico/css/style.css"/>
    </head>
    <center>
        <div class="banner_reportes">
            <img src='publico/images/banner.png' width="100%" height="100%"/>
        </div>
    </center>
    <div style="position: relative; width: 100%;">
        <div class="menu_resportes">
            <img src='publico/images/pc.png' style="margin-left:5px; margin-right: 25px; width: 24px; height: 18px"/>
            <img src='publico/images/planificacion1.png'/>
            Planificaci&oacute;n
            <img src='publico/images/ensayo1.png' style="margin-left:15px;" width="15px" height="15px"/>
            Ensayo
            <img src='publico/images/desc.png' style="margin-left:2px;" width="7px" height="7px"/>
            <img src='publico/images/reportes1.png' style="margin-left:15px;"width="15px" height="15px"/>
            <a href="reportes/">Reportes</a>
            <img src='publico/images/estadisticas1.png' style="margin-left:15px;" width="15px" height="15px"/>
            Estad&iacute;sticas
            <img src='publico/images/mixer1.png' style="margin-left:15px;" width="15px" height="15px"/>
            Mixer
            <span style="margin-left: 22%;">
                <img src='publico/images/user1.png' style="margin-left:15px;" width="15px" height="15px"/>
                (cambiar por verdadero)<?php //echo $user; ?>
            </span>
        </div>
    </div>
    <body>
    <center>
        <div style="margin-top: 75px;">
            <img src='publico/images/bienvenido.png' width="70%" height="70%"/>
        </div>
    </center>
    <div class="footer_reportes">
        <center>
            Copyright &copy;
            1515 OENS Ingenier&iacute;
            a C.R.T 311516134701
            <br>
            Desarrollado para: Productos de Concreto,S.A Todos los Derechos Reservados
        </center>
    </div>
</center>
<br>
<!-- jQuery Version 1.11.0 -->
<script src="../publico/js/jquery-1.11.0.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="../publico/js/bootstrap/bootstrap.min.js"></script>
<!-- Metis Menu Plugin JavaScript -->
<script src="../publico/js/plugins/metisMenu/metisMenu.min.js"></script>
<!-- Custom Theme JavaScript -->
<script src="../publico/js/sb-admin-2.js"></script>
<script src="../publico/js/bs-wizard.js"></script>
<script src="../publico/js/jAlert/jAlert-v2.js"></script>
</body>
</html>

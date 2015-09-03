<?php



header('Content-type: text/html; charset=utf-8', true);



class Conexion {



    function Conectarse() {

        $se = "localhost";

        $us = "pccompany";

        $cl = "pccompany2015";

        $bd = "iceberg";



        if (!($link = mysqli_connect($se, $us, $cl ,$bd ))) {

            echo 'En estos momentos no se puede establecer conexi&oacute;n con con el servidor intente mas tarde. Gracias';

            exit();

        }




        if (!mysqli_select_db( $link , $bd)) {

            echo 'En estos momentos no se puede establecer conexi&oacute;n con con el servidor intente mas tarde. Gracias';

            exit();

        }

        mysqli_query( $link ,"SET NAMES 'utf8'" );

        return $link;

    }



}



?>


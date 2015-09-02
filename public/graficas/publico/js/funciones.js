$(document).ready(function() {
    //carga de consultas
    $('#resistencia').click(function() {
        cargar_tab('vistas/resistencia.php');
    });
    $('#cagregado').click(function() {
        cargar_tab('vistas/cagregado.php');
    });
    $('#ccemento').click(function() {
        cargar_tab('vistas/ccemento.php');
    });
    $('#ccemento1').on('click', function() {
        params = {};
        params.cedula = '';
        $('#popupbox').load('ajax/ccemento.php', params, function() {
            $('#block').show();
            $('#popupbox').show();
        });
    });
    $('#cancelar').on('click', function() {
        $('#block').hide();
        $('#popupbox').hide();
    });
});
/**Funciones de Generacion de Reportes**/
//Funciones de reportes de resistencia
$('#buscar_mes').on('click', function() {
    var mes = $("#mes").val();
    var ensayo = $('#ensayo').val();
    var caso = 2;
    //alert(mes);
    if (ensayo == 'e') {
        $.fn.jAlert({
            'title': 'Tipo de Ensayo',
            'message': 'Seleccione un Tipo de Ensayo',
            'theme': 'dark',
            'btn': [
                {'label': 'Aceptar', 'cssClass': 'dark', 'closeOnClick': true}
            ],
            'closeBtn': false
        });
    }
    else if (mes == 's') {
        $.fn.jAlert({
            'title': 'Mes para la Consulta',
            'message': 'Debe seleccionar el mes para la consulta.',
            'theme': 'dark',
            'btn': [
                {'label': 'Aceptar', 'cssClass': 'dark', 'closeOnClick': true}
            ],
            'closeBtn': false
        });
    } else {
        params = {};
        params.mes = mes,
        params.ensayo = ensayo,
        params.caso = caso,
        $('#contenedor_informacion').load('ajax/resistencia.php', params, function() {
            $('#graficas').show();
        });
    }

});
$('#buscar_fecha').on('click', function() {
    var error=0;
    var fecha_inicio = $("#fecha_inicio").val();
    var fecha_fin = $("#fecha_fin").val();
    var ensayo = $('#ensayo').val();
    var caso = 1;
    //alert(mes);
    if (ensayo == 'e') {
        $.fn.jAlert({
            'title': 'Tipo de Ensayo',
            'message': 'Seleccione un Tipo de Ensayo',
            'theme': 'dark',
            'btn': [
                {'label': 'Aceptar', 'cssClass': 'dark', 'closeOnClick': true}
            ],
            'closeBtn': false
        });
        error++;
    }
     if (fecha_inicio === '' || fecha_fin === '') {
         $.fn.jAlert({
             'title': 'Fecha para la Consulta',
             'message': 'Debe seleccionar las fechas para la consulta.',
             'theme': 'dark',
             'btn': [
                 {'label': 'Aceptar', 'cssClass': 'dark', 'closeOnClick': true}
             ],
             'closeBtn': false
         });
         error++;
     }

     if (fecha_inicio > fecha_fin) {
        $.fn.jAlert({
                'title': 'Fecha de Fin',
                'message': 'La  Fecha de Inicio no debe ser mayor que la Fecha de Fin.',
                'theme': 'dark',
                'btn': [
                    {'label': 'Aceptar', 'cssClass': 'dark', 'closeOnClick': true}
                ],
                'closeBtn': false
            });
            $("#fecha_fin_error").addClass("faltante");
            error++;
        }else {
            $("#fecha_fin_error").removeClass("faltante");
        }
    var parts = fecha_inicio.split("/");
    var fecha_inicio = parts[2] + "-" + parts[1] + "-" + parts[0];
    var parts1 = fecha_fin.split("/");
    var fecha_fin = parts1[2] + "-" + parts1[1] + "-" + parts1[0];
    if(error==0) {
        params = {};
        params.fecha_inicio = fecha_inicio,
        params.fecha_fin = fecha_fin,
        params.ensayo = ensayo,
        params.caso = caso,
        $('#contenedor_informacion').load('ajax/resistencia.php', params, function () {
            $('#graficas').show();
        });
    }


});
//fin funciones de Reportes de Resistencia

//reportes de consumo de agregados
$('#buscar_mes_agregado').on('click', function() {
    var mes = $("#mes").val();
    var ensayo = $('#ensayo').val();
    //alert(mes);
    if (ensayo == 'e') {
        $.fn.jAlert({
            'title': 'Tipo de Ensayo',
            'message': 'Seleccione un Tipo de Ensayo',
            'theme': 'dark',
            'btn': [
                {'label': 'Aceptar', 'cssClass': 'dark', 'closeOnClick': true}
            ],
            'closeBtn': false
        });
    }
    else if (mes == 's') {
        $.fn.jAlert({
            'title': 'Mes para la Consulta',
            'message': 'Debe seleccionar el mes para la consulta.',
            'theme': 'dark',
            'btn': [
                {'label': 'Aceptar', 'cssClass': 'dark', 'closeOnClick': true}
            ],
            'closeBtn': false
        });
    } else {
        params = {};
        params.mes = mes;
        params.ensayo = ensayo;
        $('#contenedor_informacion').load('ajax/cagregado.php', params, function() {
            $('#graficas').show();
        });
    }

});
//Fin reportes de consumo de agregados

//reportes de consumo de cemento
$('#buscar_mes_cemento').on('click', function() {
    var mes = $("#mes").val();
    var ensayo = $('#ensayo').val();
    //alert(mes);
    if (ensayo == 'e') {
        $.fn.jAlert({
            'title': 'Tipo de Ensayo',
            'message': 'Seleccione un Tipo de Ensayo',
            'theme': 'dark',
            'btn': [
                {'label': 'Aceptar', 'cssClass': 'dark', 'closeOnClick': true}
            ],
            'closeBtn': false
        });
    }
    else if (mes == 's') {
        $.fn.jAlert({
            'title': 'Mes para la Consulta',
            'message': 'Debe seleccionar el mes para la consulta.',
            'theme': 'dark',
            'btn': [
                {'label': 'Aceptar', 'cssClass': 'dark', 'closeOnClick': true}
            ],
            'closeBtn': false
        });
    } else {
        params = {};
        params.mes = mes;
        params.ensayo = ensayo;
        $('#contenedor_informacion').load('ajax/ccemento.php', params, function() {
            $('#graficas').show();
        });
    }

});
//Fin reportes de consumo de cemento
//Funciones extras-calculos-ajax

//Fin Funciones extras-calculos-ajax
//Actualizacion de las pantallas
function cargar_tab(tab) {
    $('#contenido').html('<center><img style="width:25%;vertical-align=midle; margin-top:10%;  height:25%; transform: translate(-50%, -50%);" src="../publico/images/cargando_animacion.gif"></center>').fadeIn(10000);
    $('#contenido').load(tab);
}

function cargar_tab_subtitulo(tab) {
    $('#subtitulo').html(tab);
}
//Fin Actualizacion de las pantallas
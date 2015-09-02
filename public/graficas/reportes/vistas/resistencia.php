<?php
include_once '../../configuracion/path.php';
include_once $PATH . 'controlador/control/Control.class.php';
include_once $PATH . 'configuracion/parametros.php';
?>
<script src="../publico/js/funciones.js"></script>
<div class="row setup-content" id="step-1">
    <form id="form-step-1" class="form-step-1" enctype="multipart/form-data">
        <div class="bv_reportes">Reportes de Resistencia</div>
        <table style="width: 100%">
            <tr>
                <td>
                    <span style="text-align: left;"><strong>Ensayo</strong></span>
                </td>
                <td colspan="3">
                    <span style="text-align: left;" id="fecha_fin_error"><strong>Rango de Fechas a Consultar</strong></span>
                </td>
                <td>
                    <span style="text-align: left;"><strong>Mes Consultar</strong></span>
                </td>
            </tr>
            <tr>
                <td>
                    <select name="ensayo" id="ensayo" class="form-control">
                        <option value="e">Seleccione</option>
                        <option value="transferencia">Transferencia</option>
                        <option value="falla7">Falla de 7 d&iacute;as</option>
                        <option value="falla28">Falla de 28 d&iacute;as</option>
                        <option value="todos">Todas</option>
                    </select>
                </td>
                <td>
                    <input type="text" class="form-control" id="fecha_inicio" placeholder="Ingrese Fecha Inicio"  value = "">
                </td>
                <td>
                    <input type="text" class="form-control" id="fecha_fin" placeholder="Ingrese Fecha Fin"  value = "">
                </td>
                <td>
                    <a id="buscar_fecha" class="boton_reportes_1 btn btn-primary btn-lg">Buscar</a>
                </td>
                <td>
                    <select name="mes" id="mes" class="form-control" >
                        <option value="s">Seleccione</option>
                        <option value="1">Enero</option>
                        <option value="2">Febrero</option>
                        <option value="3">Marzo</option>
                        <option value="4">Abril</option>
                        <option value="5">Mayo</option>
                        <option value="6">Junio</option>
                        <option value="7">Julio</option>
                        <option value="8">Agosto</option>
                        <option value="9">Septiembre</option>
                        <option value="10">Octubre</option>
                        <option value="11">Noviembre</option>
                        <option value="12">Diciembre</option>
                    </select>
                </td>
                <td>
                    <a id="buscar_mes" class="boton_reportes_1 btn btn-primary btn-lg">Buscar</a>
                </td>
            </tr>
        </table>
    </form>
    <div id="contenedor_informacion">
    </div>
</div>
<script type="text/javascript">
    $(function() {
        //Array para dar formato en español
        $.datepicker.regional['es'] =
                {
                    closeText: 'Cerrar',
                    prevText: 'Previo',
                    nextText: 'Pr&oacute;ximo',
                    monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
                        'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                    monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun',
                        'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
                    monthStatus: 'Ver otro mes', yearStatus: 'Ver otro año',
                    dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
                    dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sáb'],
                    dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa'],
                    dateFormat: 'dd/mm/yy', firstDay: 0,
                    initStatus: 'Selecciona la fecha', isRTL: false};
        $.datepicker.setDefaults($.datepicker.regional['es']);

        //miDate: fecha de comienzo D=días | M=mes | Y=año
        //maxDate: fecha tope D=días | M=mes | Y=año
        $("#fecha_inicio").datepicker({minDate: "-16Y", maxDate: "D", todayBtn: "linked"});
        $("#fecha_fin").datepicker({minDate: "-16Y", maxDate: "D", todayBtn: "linked"});
    });
</script>

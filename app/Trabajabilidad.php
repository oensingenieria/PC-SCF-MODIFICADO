<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Trabajabilidad extends Model {

protected $table = 'revenimiento';

protected $fillable = ['Numero_Carga' ,
'Nombre_Proyecto',
'Nombre_Elemento',
'Fecha_Ensayo',
'Fecha_Registro',
'Fecha_Carga',
'Hora_Ensayo',
'Revenimiento',
'Temperatura',
'Volumen',
 'Zona',
 'Encargado',
 'Nombre_Cuenta',
'Codigo_Tarro',
'Observaciones',
'vebe',
'falla',
'transferencia',
'desecho',
'Codigo_Diseño'];

}

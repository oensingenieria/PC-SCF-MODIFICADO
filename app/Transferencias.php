<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Transferencias extends Model {

protected $table = 'transferencia';

protected $fillable = ['Fecha_Ensayo',
						'Fecha_Registro',
						'Fecha_Carga',
			            'Falla1',
			            'Hora_f1',
						'Edad_f1',
						'Falla2',
						'Hora_f2',
						'Edad_f2',
						'Falla3',
						'Hora_f3',
						'Edad_f3',
						'Promedio_Carga',
						'Codigo_Diseño',
						'Numero_Carga',
						'Encargado',
			           'Nombre_Cuenta'

];

}

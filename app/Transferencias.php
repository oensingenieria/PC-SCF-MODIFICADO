<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Transferencias extends Model {

protected $table = 'transferencia';

protected $fillable = ['fecha','hora','falla','id_cod_carga','promedio','nombre_cilindro','estado','Nombre_Cuenta'];

}

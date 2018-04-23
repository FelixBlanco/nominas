<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BancoEmpleado extends Model
{
	use SoftDeletes;
	
	protected $table = 'banco_empleados';

	protected $fillable = ['descripcion','empleados_id'];

	protected $dates = ['deleted_at'];

	// Relaciones
	public function empleado(){
		return $this->belongsTo('App\Empleado','empleados_id');
	}
}

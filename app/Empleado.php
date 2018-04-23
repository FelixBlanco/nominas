<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Empleado extends Model
{
	use SoftDeletes;
	
    protected $table = 'empleados';

    protected $fillable = ['full_nombre','direccion','nro_aco','users_id'];

	protected $dates = ['deleted_at'];

	// Relaciones
	public function bancoempleados(){
		return $this->hasMany('App\BancoEmpleado','id');
	}
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Empleado extends Model
{
	use SoftDeletes;
	
    protected $table = 'empleados';

    protected $fillable = ['full_nombre','direccion','nro_aco','empresa'];

	protected $dates = ['deleted_at'];
}

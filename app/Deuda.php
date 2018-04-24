<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Deuda extends Model
{
	use SoftDeletes;
	
	protected $table = 'deudas';

	protected $fillable = ['monto','empleados_id'];

	protected $dates = ['deleted_at'];
}

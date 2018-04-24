<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Abono extends Model
{
	use SoftDeletes;
	
	protected $table = 'abonos';

	protected $fillable = ['monto','empleados_id'];

	protected $dates = ['deleted_at'];
}

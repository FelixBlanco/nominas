<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pago extends Model
{
	use SoftDeletes;
	
    protected $table = 'pagos';

    protected $fillable = ['sub_total','efectivo','total_neto','empleados_id'];

	protected $dates = ['deleted_at'];
}

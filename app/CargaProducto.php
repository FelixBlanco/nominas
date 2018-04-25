<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CargaProducto extends Model
{
	use SoftDeletes;
	
    protected $table = 'carga_productos';

    protected $fillable = ['nro_sacos','day','estado_pago','empleados_id','tipo_productos_id'];

	protected $dates = ['deleted_at'];

	// Relaciones
	public function tipoProducto(){
		return $this->belongsTo('App\TipoProducto','tipo_productos_id');
	}
}

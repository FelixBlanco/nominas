<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class PrecioProducto extends Model
{
	// use SoftDeletes;
	
    protected $table = 'precio_productos';

    protected $fillable = ['monto','observacion_precio','tipo_productos_id'];

	// protected $dates = ['deleted_at'];

	// Relaciones

	public function producto(){
		return $this->belongsTo('App\Tipoproducto','tipo_productos_id');
	}
}

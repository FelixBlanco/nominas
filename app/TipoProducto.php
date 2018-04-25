<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoProducto extends Model
{

	use SoftDeletes;
	
    protected $table = 'tipo_productos';

    protected $fillable = ['nombre','observacion'];

	protected $dates = ['deleted_at'];

	// Relaciones

	public function precios(){
		return $this->hasMany('App\PrecioProducto','id');
	}
   
	public function cargaProductos(){
		return $this->hasMany('App\CargaProducto','id');
	}

}

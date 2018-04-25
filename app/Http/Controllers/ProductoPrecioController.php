<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\TipoProducto;
use App\PrecioProducto;

class ProductoPrecioController extends Controller
{
    public function index(){
    	return view('productos-precios.index');
    }

    public function infoProductos($id){
        $i = TipoProducto::find($id);
        return $i;
    }

    public function getProductos(){
    	$p = TipoProducto::orderby('id','desc')->get();
    	return $p;
    }

    public function storeProducto(Request $request){
    	$s = new TipoProducto($request->all());
    	$s->save();
    	return $s;
    }

    // Precio Producto

    public function getPrecios(){
    	$p = PrecioProducto::orderby('id','desc')->get();
    	$p->each(function($p){
    		$p->tipoProducto = $p->producto->nombre;
    	});
    	return $p;
    }

    public function storePrecio(Request $request){
    	$p = new PrecioProducto($request->all());
    	$p->save();
    	return $p;
    }

}

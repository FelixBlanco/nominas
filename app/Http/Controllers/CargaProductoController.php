<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\CargaProducto;

class CargaProductoController extends Controller
{
    public function index(){
    	return view('carga-producto.index');
    }

    public function getProductos($id){
    	$p = CargaProducto::where('empleados_id',$id)->get();
    	$p->each(function($p){
    		$p->nameProducto = $p->tipoProducto->nombre;
    	});
    	return $p;
    }

    public function addProductos(Request $request){
    	$a = new CargaProducto($request->all());
    	$a->estado_pago = 'pendiente';
    	$a->save(); return $a;
    }

    public function deleteCarga($id){
    	$d = CargaProducto::find($id);
    	$d->delete();
    	$d->save();
    	return $d;
    }

}

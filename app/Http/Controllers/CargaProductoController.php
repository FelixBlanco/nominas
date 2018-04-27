<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\CargaProducto;

class CargaProductoController extends Controller
{
    public function index(){
    	return view('carga-producto.index');
    }

    public function getProductos($id,$producto){
    	$p = CargaProducto::where([['empleados_id',$id],['tipo_productos_id',$producto]])->get();
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

    public function totalSacos($empleado,$tipoProducto){
        $totales = CargaProducto::where([
            ['empleados_id',$empleado],['tipo_productos_id',$tipoProducto]
        ])->sum('nro_sacos');
        return $totales;
    }

    public function getCargas($empleado){
        $c = CargaProducto::where('empleados_id',$empleado)->get();
        return $c;
    }
}

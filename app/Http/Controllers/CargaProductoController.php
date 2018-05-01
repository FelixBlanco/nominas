<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\CargaProducto;
use App\TipoProducto;
use App\PrecioProducto;

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
    	$a->pagos_id = '';
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
        
        // Lista de Productos Cargados
        $c = CargaProducto::where('empleados_id',$empleado)->get();
        $c->each(function($c){
            $c->tipoProdcuto = $c->tipoProducto->nombre;
        });

        // Total sacos general 
        $AllSacosGeneral = CargaProducto::where('empleados_id',$empleado)->sum('nro_sacos');

        // Tipos de Productos
        $tipoP = TipoProducto::get();

        $acumulador  = 1;
        $totalSacosProductos = [];

        // Total de Sacos de Cada Producto
        foreach ($tipoP as $tipo) {

            // El id del tipo de producto
            $totalSacosProductos[$acumulador]['tipo_producto_id'] = $tipo->id;

            // Nombre del Producto
            $totalSacosProductos[$acumulador]['nombre_producto'] = $tipo->nombre;

            // Total de Sacos
            $totalSacosProductos[$acumulador]['total_sacos'] = CargaProducto::where([
                ['empleados_id',$empleado],['tipo_productos_id',$tipo->id]
            ])->sum('nro_sacos');
            
            // Informacion General 
            $totalSacosProductos[$acumulador]['data'] = CargaProducto::where([
                ['empleados_id',$empleado],['tipo_productos_id',$tipo->id]
            ])->get();

            $acumulador++;
        }

        // Precios Totales
        $precios = PrecioProducto::get();
        $acumulador1 = 0;
        $totalMontos = []; 

        foreach ($totalSacosProductos as $totalSacosProducto) {
            foreach ($precios as $precio) {
                // verificamos que sea el mismo tipo de producto
                if ($precio->tipo_productos_id == $totalSacosProducto['tipo_producto_id']) {
                    // Nombre del Producto
                    $totalMontos[$acumulador1]['nombreProducto'] = $totalSacosProducto['nombre_producto'];
                    // Total del monto precio con el total de sacos
                    $totalMontos[$acumulador1]['monto'] = $precio->monto *  $totalSacosProducto['total_sacos'];
                    // Acumulador 
                    $acumulador1++;
                }
            }
        }
        

        //  Sub Total de todo
        $subTotal = 0;
        foreach ($totalMontos as $totalMonto) {
            $subTotal = $totalMonto['monto'] + $subTotal;
        }

        return $total = [
            'c' => $c,
            'TotalSacosGeneral' => $AllSacosGeneral,
            'sacosProduto'  => $totalSacosProductos,
            'montoGenerales'    => $totalMontos,
            'subTotal' => $subTotal
        ];
    }
}

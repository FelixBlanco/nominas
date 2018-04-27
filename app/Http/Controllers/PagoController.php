<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Empleado;
use App\TipoProducto;
use App\CargaProducto;

class PagoController extends Controller
{
    public function index(){
    	return view('pago.index');
    }
    public function pagos(){
    	
    	$cargas = CargaProducto::where('empleados_id',1)->get();

    	$tipoProductos = TipoProducto::get();

    	$data = []; // Variable Null
    	$nro = 0; // $cargas->count() Cantidad de Data

    	$nroSacosTotal = 0; // Totales Generales 
    	// Total por producto

    		foreach ($tipoProductos as $tipoProducto) { // Verificamos y organizamos la cantidad de pedidos
    	foreach ($cargas as $carga ) { // Recorremos toda las cargas 
    			if ($carga->tipo_productos_id == $tipoProducto->id) {
    				$data[$tipoProducto->nombre][$nro]= [
    					'idProducto'		=> $tipoProducto->id,
    					'nombreProducto' 	=> $tipoProducto->nombre,
    					'nro_sacos'			=> $carga->nro_sacos,
	    			];
	    			$nroSacosTotal = $nroSacosTotal + $carga->nro_sacos;
	    			$nro++;
    			}
    		}
    	}

    	$info = [
    		'data' => $data,
    		'nroSacosTotal' => $nroSacosTotal
    	];

    	return $data;
    }
}

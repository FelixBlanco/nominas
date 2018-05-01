<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Pago;
use App\CargaProducto;

class PagoController extends Controller
{
    public function index(){
    	return view('pago.index');
    }
    
    public function add(Request $request){
               
        $a = new Pago($request->all());
        $a->save();

        foreach ($request['cargas'] as $key) {
            $u = CargaProducto::find($key['id']);
            $u->estado_pago = 'pago';
            $u->fecha_pago  = date('Y-m-d');
            $u->pagos_id    = $a->id;
            $u->save();
        }
 
    }
}

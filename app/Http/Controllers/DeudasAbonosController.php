<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Deuda;
use App\Abono;

class DeudasAbonosController extends Controller
{
    public function index(){
    	return view('abono-deuda.index');
    }

    public function totales($id){
    	$abonos = Abono::where('empleados_id',$id)->sum('monto');
    	$deudas = Deuda::where('empleados_id',$id)->sum('monto');
    	$total = $deudas - $abonos;
    	return $total;
    }

    public function getDeudas($idEmpleado){
    	$g = Deuda::where('empleados_id',$idEmpleado)->get();
    	return $g;
    }

    public function addDeudas(Request $request){
    	$d = new Deuda($request->all());
    	$d->save();
    	return $d;
    }

    public function destroyDeudas($id){
    	$d = Deuda::find($id);
    	$d->delete();
    	$d->save();
    	return $d;
    }

    public function getAbonos($idEmpleado){
    	$g = Abono::where('empleados_id',$idEmpleado)->get();
    	return $g;
    }

    public function addAbonos(Request $request){
    	$d = new Abono($request->all());
    	$d->save();
    	return $d;
    }

    public function destroyAbonos($id){
    	$d = Abonos::find($id);
    	$d->delete();
    	$d->save();
    	return $d;
    }
}

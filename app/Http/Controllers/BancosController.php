<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\BancoEmpleado;

class BancosController extends Controller
{
	public function index(){
		return view('banco-empleado.index');
	}
	
	public function get(){
		$g = BancoEmpleado::all();
		$g->each(function($g){
			$g->nombreEmpleado = $g->empleado->full_nombre;
		});
		return $g;
	}

    public function store(Request $request){
    	$s = new BancoEmpleado($request->all());
    	$s->save();
    	return $s;
    }
}

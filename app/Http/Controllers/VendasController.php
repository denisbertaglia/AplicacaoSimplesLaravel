<?php

namespace App\Http\Controllers;

use App\Models\Estado;
use Illuminate\Http\Request;

class VendasController extends Controller
{
    public function index(){
        $estados = Estado::get();
        return view("venda.registra", compact('estados'));
    }
    
    public function registro(Request $request){
        dd($request->all());
    }
    
    public function historico(){
        return view("venda.historico");
    }
    
}

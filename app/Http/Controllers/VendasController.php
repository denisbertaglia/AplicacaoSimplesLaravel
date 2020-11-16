<?php

namespace App\Http\Controllers;

use App\Models\Estado;
use App\Service\VendaService;
use Illuminate\Http\Request;

class VendasController extends Controller
{
    public VendaService $vendaService;
    public function __construct(VendaService $vendaService)
    {
        $this->vendaService = $vendaService;
    }
    public function index(){
        $estados = Estado::get();
        return view("venda.registra", compact('estados'));
    }
    
    public function registro(Request $request){
        $venda = $request->except("_token");
        
        $this->vendaService->realizaVenda($venda);
        
        return redirect(route("venda.historico"));
    }
    
    public function historico(){
        $vendas = $this->vendaService->recuperaVendas();
        return view("venda.historico", compact('vendas'));
    }
    
    public function resgatarVenda(int $idVenda){
    
        return $this->vendaService->recuperaVenda($idVenda);
    }
}

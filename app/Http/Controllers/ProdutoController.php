<?php

namespace App\Http\Controllers;

use App\Service\ProdutoService;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function __construct(ProdutoService $produtoService)
    {
        $this->produtoService = $produtoService;
    }
    public function recuperaProduto(Request $request){
        $pesquisa = (is_null($request->pesquisa))? '': $request->pesquisa ;
        $produtos = $this->produtoService->recuperaProduto($pesquisa);
        return $produtos;
    }
}

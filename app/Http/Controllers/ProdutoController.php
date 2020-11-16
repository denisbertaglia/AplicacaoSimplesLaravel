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
    public function recuperaProdutos(Request $request){

        if(isset($request->idProduto)){
            $produtos = $this->produtoService->recuperaProdutoPorId($request->idProduto);
            return $produtos;
        }
        
        $pesquisa = (is_null($request->pesquisa))? '': $request->pesquisa ;
        $produtos = $this->produtoService->recuperaProdutos($pesquisa);

        return $produtos;
    }


}

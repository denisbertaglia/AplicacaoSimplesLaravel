<?php

namespace App\Service;

use App\Models\Produto;

class ProdutoService {

    public function recuperaProdutos(string $nomeProduto ='')
    {
        if(!empty($nomeProduto)){
            $produto =  Produto::with('fornecedores')->where('nome','like', "%{$nomeProduto}%")
                            ->get();
            
            return $produto;
        }

        return Produto::with('fornecedores')->get();
    }

    public function recuperaProdutoPorId(int $idProduto = 0)
    {
        if($idProduto){
            $produto =  Produto::with('fornecedores')->find($idProduto);
            
            return $produto;
        }

        return [];
    }
 }
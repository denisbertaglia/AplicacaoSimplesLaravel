<?php

namespace App\Service;

use App\Models\Produto;

class ProdutoService {

    public function recuperaProduto(string $nomeProduto ='')
    {
        if(!empty($nomeProduto)){
            $produto =  Produto::with('fornecedores')->where('nome','like', "%{$nomeProduto}%")
                            ->get();
            
            return $produto;
        }

        return Produto::with('fornecedores')->get();
    }
 }
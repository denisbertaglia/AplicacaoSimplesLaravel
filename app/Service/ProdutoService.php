<?php

namespace App\Service;

use App\Models\Produto;
use Illuminate\Database\Eloquent\Collection;

class ProdutoService {

    public function recuperaProdutosPorNome(string $nomeProduto ='')
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

    public function recuperaProdutoPorIds($ids) :Collection
    {
        return Produto::with('fornecedores')->whereIn('id',$ids)->get();
    }
 }
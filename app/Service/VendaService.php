<?php

namespace App\Service;

use App\Models\Produto;
use App\Models\Venda;

class VendaService {

    public function realizaVenda($vendaVendaItens)
    {
        $venda = array_filter($vendaVendaItens,function( $key){
            return $key !=='produtoId';
        }, ARRAY_FILTER_USE_KEY);

        $vendaItems = $this->insertVendaItem($vendaVendaItens['produtoId'])->toArray();
        $venda =  Venda::create($venda);
        $venda->items = $venda->items()->createMany($vendaItems);
        return $venda;
    }
    public function recuperaVendas(){
        return Venda::orderBy('id', 'DESC')->get();
    }

    public function recuperaVenda(int $id){
        return Venda::with(['items','items.produto'])
        ->find($id);
         
    }
    
    private function insertVendaItem( $itensId)
    {
        $produtoService = new ProdutoService();

        $produtos = $produtoService->recuperaProdutoPorIds($itensId);
        $vendaItem = $produtos->map(function(Produto $produto){
            return [
                'referencia' => $produto->referencia,
                'nome' => $produto->nome,
                'preco' => $produto->preco,
                'fornecedor' =>$produto->nome_fornecedores ,
                'produto_id' => $produto->id
            ];
        });
        
        return  $vendaItem;
    }
 }
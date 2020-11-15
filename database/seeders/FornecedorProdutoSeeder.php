<?php

namespace Database\Seeders;

use App\Models\Fornecedor;
use App\Models\Produto;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FornecedorProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Fornecedor::insert([
            [ 'nome'=> 'Coral'],
            [ 'nome'=> 'Suvinil'],
            [ 'nome'=> 'Sherwin Williams'],
        ]);
        
        Produto::insert([
            [   
                'nome'=> 'Massa Corrida 25 kg', 
                'referencia'=> '4321',
                'preco'=> 69.99
            ],
            [
                'nome'=> 'Tinta Latex Branca 18 litros',
                'referencia'=> '5324', 
                'preco'=> 334.99
            ],
            [
                'nome'=> 'Teste Facil Delicia Coral de Café', 
                'referencia'=> '6454', 
                'preco'=> 11.99
            ],
            [
                'nome'=> 'Solvente Aguarrás', 
                'referencia'=> '6455', 
                'preco'=> 20.99
            ],
            [
                'nome'=> 'Tinta Acrílica Fosca Super Premium Aquacryl Branca 18 Litros', 
                'referencia'=> '6456', 
                'preco'=> 349.99
            ],
        ]);

        DB::table('produto_fornecedor')->insert([
            [
                'produto_id' => 1,
                'fornecedor_id'=> 1
            ],
            [
                'produto_id' => 1,
                'fornecedor_id'=> 2
            ],
            [
                'produto_id' => 1,
                'fornecedor_id'=> 3
            ],
            
            [
                'produto_id' => 2,
                'fornecedor_id'=> 1
            ],
            [
                'produto_id' => 2,
                'fornecedor_id'=> 3
            ],
            [
                'produto_id' => 3,
                'fornecedor_id'=> 1
            ],
            [
                'produto_id' => 4,
                'fornecedor_id'=> 1
            ],
            [
                'produto_id' => 5,
                'fornecedor_id'=> 3
            ],
        ]);
        
    }
}
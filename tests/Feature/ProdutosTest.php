<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\Concerns\InteractsWithConsole;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProdutosTest extends TestCase
{
    use RefreshDatabase, InteractsWithConsole;

    public function setUp(): void
    {
        parent::setUp();
        $this->artisan("key:generate");
    }

    /** 
     * @return void
     */
    public function testRecuperaProdutos()
    {
        $this->seed();
        $response = $this->get(route("produto.recupera"));
        $response->assertJsonStructure([
            [
                'id',
                'referencia',
                'nome',
                'preco',
                'fornecedores' =>[
                    [
                        'nome',
                    ]
                ]
            ]
        ]);
        
        $response->assertStatus(200);
    }
    /** 
     * @return void
     */
    public function testRecuperaFiltraProdutos()
    {
        $this->seed();
        
        $response = $this->get(route("produto.recupera",['pesquisa'=>'Massa']));
        $response->assertExactJson([
            ["id"=>1,"referencia"=>"4321",
            "nome"=>"Massa Corrida 25 kg",
            "preco"=>"69.99",
            "fornecedores"=>[
                ["nome"=> "Coral"],
                ["nome"=>"Suvinil"],
                ["nome"=>"Sherwin Williams"]
                ]],
            ]);
        $response->assertStatus(200);
    }

}

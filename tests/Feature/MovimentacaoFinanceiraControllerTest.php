<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use App\Models\MovimentacaoFinanceira;



class MovimentacaoFinanceiraControllerTest extends TestCase
{
    use DatabaseTransactions;
    use WithoutMiddleware;

    public function testIndex()
    {
        // Cenário de teste para o método index
        $response = $this->get('/movto?paginate=all');

        // Asserts para verificar o resultado do método
        $response->assertStatus(200);
        // Verifique se a resposta contém uma coleção de contas ou uma mensagem de erro
        $response->assertJsonStructure(['data' => ['*' => ['documento', 'data', 'motivo', 'contaDebitar', 'contaCreditar', 'obs', 'valor']]]);

        // Cenário de teste para o método index com paginação
        $response = $this->get('/movto?paginate=10');

        // Asserts para verificar o resultado do método com paginação
        $response->assertStatus(200);
        // Verifique se a resposta contém uma coleção paginada de contas ou uma mensagem de erro
        $response->assertJsonStructure(['data' => ['*' => ['documento', 'data', 'motivo', 'contaDebitar', 'contaCreditar', 'obs', 'valor']], 'links', 'meta']);
    }

    public function testStore()
    {
        $data = [
            'motivo' => 1,
            'contaDebitar' => '1.1.1',
            'contaCreditar' => '2.3.3',
            'valor' => 25,
            // 'data' => fake()->date('Y-m-d')
        ];

        $response = $this->post('/movto', $data);

        $response->assertStatus(201);

        $response->assertJsonStructure(['data' => ['documento', 'data', 'motivo', 'contaDebitar', 'contaCreditar', 'obs', 'valor']]);
    }

    public function testStorePut()
    {
        $data = [
            'motivo' => 1,
            'contaDebitar' => '1.1.1',
            'contaCreditar' => '2.3.3',
            'valor' => 25,
            // 'data' => fake()->date('Y-m-d')
        ];

        $response = $this->put('/movto', $data);

        $response->assertStatus(201);

        $response->assertJsonStructure(['data' => ['documento', 'data', 'motivo', 'contaDebitar', 'contaCreditar', 'obs', 'valor']]);
    }
    

    public function testDelete()
    {
        $movto = MovimentacaoFinanceira::factory()->create();
        
        $response = $this->delete('/movto/'.$movto->documento);

        $response->assertStatus(204);
    }

    public function testUpdatePut()
    {
        // Crie uma conta para ser atualizada
        $movto = MovimentacaoFinanceira::factory()->create();

        // Dados de teste para atualizar a conta
        $data = [   
            'motivo' => 1,
            'contaDebitar' => '1.1.18',
            'contaCreditar' => '2.3.3',
            'valor' => 25,
            "data" => '2023-06-14',
            "obs" => 'Objeto Atualizado',
            "documento" => $movto->documento
        ];

        // Cenário de teste para o método update
        $response = $this->put('/movto/'.$movto->documento, $data);

        // Asserts para verificar o resultado do método
        $response->assertStatus(200);
        // Verifique se a resposta contém os dados atualizados da conta
        $response->assertJson(
            [
                "documento" => "$movto->documento",
                "data" =>  '2023-06-14',
                "motivo"=> 1,
                "contaDebitar"=> "1.1.18",
                "contaCreditar"=> "2.3.3",
                "obs"=> "Objeto Atualizado",
                "valor"=> "25"
            ]
        );
    }

    public function testUpdatePatch()
    {
        // Crie uma conta para ser atualizada
        $movto = MovimentacaoFinanceira::factory()->create();

        // Dados de teste para atualizar a conta
        $data = [
            'contaDebitar' => '1.1.5',
        ];

        // Cenário de teste para o método update
        $response = $this->patch('/movto/'.$movto->documento, $data);

        // Asserts para verificar o resultado do método
        $response->assertStatus(200);
        // Verifique se a resposta contém os dados atualizados da conta
        $response->assertJson(
            [
                "documento" => "$movto->documento",
                "data" => $movto->data,
                "motivo"=> 1,
                "contaDebitar"=> "1.1.5",
                "contaCreditar"=> "1.1.2",
                "obs"=> null,
                "valor"=> "$movto->valor"
            ]
        );
    }
}

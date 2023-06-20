<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use App\Models\MotivoMovto;


class MotivoMovtoTest extends TestCase
{
    use DatabaseTransactions;
    use WithoutMiddleware;

    public function testIndex()
    {
        // Cenário de teste para o método index
        $response = $this->get('/motivo_movto?paginate=all');

        // Asserts para verificar o resultado do método
        $response->assertStatus(200);
        // Verifique se a resposta contém uma coleção de contas ou uma mensagem de erro
        $response->assertJsonStructure(['data' => ['*' => ['nome', 'codigo']]]);

        // Cenário de teste para o método index com paginação
        $response = $this->get('/motivo_movto?paginate=10');

        // Asserts para verificar o resultado do método com paginação
        $response->assertStatus(200);
        // Verifique se a resposta contém uma coleção paginada de contas ou uma mensagem de erro
        $response->assertJsonStructure(['data' => ['*' => ['nome', 'codigo']], 'links', 'meta']);
    }
    
    public function testStore()
    {
        $data = ['nome' => 'Bradesco', 'codigo' => 150];

        $response = $this->post('/motivo_movto', $data);

        $response->assertStatus(201);

        $response->assertJson(['data' => ['nome' => 'Bradesco', 'codigo' => 150 ]]);
    }

    public function testStorePut()
    {
        $data = ['nome' => 'Pagamento fatura', 'codigo' => 150];

        $response = $this->put('/motivo_movto', $data);

        $response->assertStatus(201);

        $response->assertJson(['data' => ['nome' => 'Pagamento fatura', 'codigo' => 150 ]]);
    }

    public function testDelete()
    {
        $motivo = MotivoMovto::factory()->create();
        
        $response = $this->delete('/motivo_movto/'.$motivo->codigo);

        $response->assertStatus(204);
    }

    public function testUpdatePut()
    {
        $motivo = MotivoMovto::factory()->create();
        
        $data = [
            'nome' => 'Gasto Cartão',
            'codigo' => 12
        ];

        $response = $this->put('/motivo_movto/'.$motivo->codigo, $data);

        $response->assertStatus(200);
    
        $response->assertJson(['nome' => 'Gasto Cartão', 'codigo' => 12 ]);
    }

    public function testUpdatePatch()
    {
        $motivo = MotivoMovto::factory()->create();
        
        $data = [
            'nome' => 'Gasto Cartão',
        ];

        $response = $this->patch('/motivo_movto/'.$motivo->codigo, $data);

        $response->assertStatus(200);
    
        $response->assertJson(['nome' => 'Gasto Cartão', 'codigo' => $motivo->codigo ]);
    }
}

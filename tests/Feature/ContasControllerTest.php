<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;
use App\Models\Contas;

class ContasControllerTest extends TestCase
{
    use DatabaseTransactions;
    use WithoutMiddleware;

    public function testIndex()
    {
        // Cenário de teste para o método index
        $response = $this->get('/contas?paginate=all');

        // Asserts para verificar o resultado do método
        $response->assertStatus(200);
        // Verifique se a resposta contém uma coleção de contas ou uma mensagem de erro
        $response->assertJsonStructure(['data' => ['*' => ['nome', 'codigo', 'tipoConta']]]);

        // Cenário de teste para o método index com paginação
        $response = $this->get('/contas?paginate=10');

        // Asserts para verificar o resultado do método com paginação
        $response->assertStatus(200);
        // Verifique se a resposta contém uma coleção paginada de contas ou uma mensagem de erro
        $response->assertJsonStructure(['data' => ['*' => ['nome', 'codigo', 'tipoConta']], 'links', 'meta']);
    }

    public function testStore()
    {
        // Dados de teste para criar uma nova conta
        $data = [
            'nome' => 'Nova Conta',
            'codigo' => '1',
            'tipo_conta' => 'D'
        ];

        // Cenário de teste para o método store
        $response = $this->post('/contas', $data);

        // Asserts para verificar o resultado do método
        $response->assertStatus(201);
        // Verifique se a resposta contém os dados da nova conta criada
        $response->assertJsonStructure(['data' => ['nome', 'codigo', 'tipoConta']]);
    }

    public function testDelete()
    {
        // Crie uma conta para ser excluída
        $conta = Contas::factory()->create();

        // Cenário de teste para o método delete
        $response = $this->delete('/contas/'.$conta->codigo);

        // Asserts para verificar o resultado do método
        $response->assertStatus(204);
    }

    public function testUpdatePut()
    {
        // Crie uma conta para ser atualizada
        $conta = Contas::factory()->create();

        // Dados de teste para atualizar a conta
        $data = [
            'nome' => 'Conta Atualizada',
            'codigo' => '1',
            'tipo_conta' => 'D'
        ];

        // Cenário de teste para o método update
        $response = $this->put('/contas/'.$conta->codigo, $data);

        // Asserts para verificar o resultado do método
        $response->assertStatus(200);
        // Verifique se a resposta contém os dados atualizados da conta
        $response->assertJson(['nome' => 'Conta Atualizada', 'codigo' => '1', 'tipoConta' => 'D']);
    }
}
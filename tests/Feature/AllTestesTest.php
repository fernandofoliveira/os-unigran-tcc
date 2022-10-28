<?php

namespace Tests\Feature;

use App\Cliente;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AllTestesTest extends TestCase
{

    public function testInsertClientes(){

        $response = $this->call('POST', '/clientes', [
            'nome'      => 'Teste nome',
            'cpf'       => 'Teste CPF',
            'whatsapp'  => 'Teste Whatsapp',
            'email'     => 'Teste Email',
        ]);
        
        $response->assertStatus($response->status(), 200);
    }

    public function testInsertServicos(){

        $response = $this->call('POST', '/servicos', [
            'nome'      => 'Teste nome',
            'preco'     => 10.00,
        ]);
        
        $response->assertStatus($response->status(), 200);
    }

    public function testInsertOrdensServicos(){

        $response = $this->call('POST', '/ordens', [
            'id_cliente'        => '2',
            'id_servico'        => '5',
            'descricao'         => 'Teste Descrição',
            'status'            => 'Orçamento',
            'prazo_estimado'    => '26/10/2022',
        ]);
        
        $response->assertStatus($response->status(), 200);
    }

    public function testUpdateClientes(){

        $response = $this->call('PUT', '/clientes', [
            'nome'      => 'Teste nome',
            'cpf'       => 'Teste CPF',
            'whatsapp'  => 'Teste Whatsapp',
            'email'     => 'Teste Email',
        ]);
        
        $response->assertStatus($response->status(), 200);
    }

    public function testUpdateServicos(){

        $response = $this->call('PUT', '/servicos', [
            'nome'      => 'Teste nome',
            'preco'     => 10.00,
        ]);
        
        $response->assertStatus($response->status(), 200);
    }

    public function testUpdateOrdensServicos(){

        $response = $this->call('PUT', '/ordens', [
            'id_cliente'        => '2',
            'id_servico'        => '5',
            'descricao'         => 'Teste Descrição',
            'status'            => 'Orçamento',
            'prazo_estimado'    => '26/10/2022',
        ]);
        
        $response->assertStatus($response->status(), 200);
    }

    public function testGetClientes() {

        $response = $this->call('GET', '/clientes');

        $response->assertStatus($response->status(), 200);
    }

    public function testGetServicos() {

        $response = $this->call('GET', '/servicos');

        $response->assertStatus($response->status(), 200);
    }

    public function testGetOrdensServicos() {

        $response = $this->call('GET', '/ordens');

        $response->assertStatus($response->status(), 200);
    }

    public function testDeleteClientes(){

        $response = $this->call('Delete', '/clientes', [
            'id'      => 2,
        ]);
        
        $response->assertStatus($response->status(), 200);
    }

    public function testDeleteServicos(){

        $response = $this->call('Delete', '/servicos', [
            'id'      => 2,
        ]);
        
        $response->assertStatus($response->status(), 200);
    }

    public function testDeleteOrdensServicos(){

        $response = $this->call('Delete', '/ordens', [
            'id'      => 2,
        ]);
        
        $response->assertStatus($response->status(), 200);
    }
    
}

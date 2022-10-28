@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row">
                <div class="col-4">
                    <a href="{{ route('servicos.index') }}" class="btn btn-primary"><- Voltar</a>
                </div>
            </div>

            <br/>

            <form action="{{ route('clientes.update', $cliente->id) }}" method="POST">
                @method('PUT')
                @csrf
                
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" value="{{ $cliente->nome }}" placeholder="Digite o nome do cliente" required>
                </div>
  
                <div class="form-group">
                    <label for="cpf">CPF</label>
                    <input type="text" class="form-control" id="cpf" name="cpf" value="{{ $cliente->cpf }}" placeholder="Digite o CPF do cliente" required>
                </div>

                <div class="form-group">
                    <label for="whatsapp">Whatsapp</label>
                    <input type="text" class="form-control" id="whatsapp" value="{{ $cliente->whatsapp }}" name="whatsapp" placeholder="Digite o Whatsapp do cliente" required>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" value="{{ $cliente->email }}" name="email" placeholder="Digite o email do cliente">
                </div>
                
                <button type="submit" class="btn btn-primary">Cadastrar</button>
            </form>
           
        </div>
    </div>
</div>
@endsection

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

            <form action="{{ route('servicos.store') }}" method="POST">
                @method('POST')
                @csrf
                
                <div class="form-group">
                  <label for="nome">Nome</label>
                  <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o nome do serviço" required>
                </div>

                <div class="form-group">
                  <label for="preco">Preço</label>
                  <input type="text" class="form-control" id="preco" name="preco" placeholder="Digite o preço do serviço" required>
                </div>
                
                <button type="submit" class="btn btn-primary">Cadastrar</button>
            </form>
           
        </div>
    </div>
</div>
@endsection

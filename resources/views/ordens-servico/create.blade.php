@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row">
                <div class="col-4">
                    <a href="{{ route('ordens.index') }}" class="btn btn-primary"><- Voltar</a>
                </div>
            </div>

            <br/>

            <form action="{{ route('ordens.store') }}" method="POST">
                @method('POST')
                @csrf
                
                <div class="form-group">
                    <label for="cliente">Cliente</label>
                    <select class="form-control" id="cliente" name="cliente">
                        @foreach ($clientes as $c)
                            <option value="{{ $c->id }}">{{ $c->nome }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="cliente">Serviço</label>
                    <select class="form-control" id="servico" name="servico">
                        @foreach ($servicos as $s)
                            <option value="{{ $s->id }}">{{ $s->nome }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <textarea class="form-control" id="descricao" name="descricao" rows="3"></textarea>
                </div>

                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" id="status" name="status">
                        <option value="Orçamento">Orçamento</option>
                        <option value="Realizando">Realizando</option>
                        <option value="Cancelada">Cancelada</option>
                        <option value="Concluída">Concluída</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="prazo_estimado">Prazo Estimado</label>
                    <input type="date" class="form-control" id="prazo_estimado" name="prazo_estimado">
                </div>
                
                <button type="submit" class="btn btn-primary">Cadastrar</button>
            </form>
           
        </div>
    </div>
</div>
@endsection

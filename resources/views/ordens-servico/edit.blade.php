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
            <form action="{{ route('ordens.update', $orden_servico->id) }}" method="POST">
                @method('PUT')
                @csrf
                
                <div class="form-group">
                    <label for="cliente">Cliente</label>
                    <select class="form-control" id="cliente" name="cliente">
                        @foreach ($clientes as $c)
                            @if ($c->id == $orden_servico->id_cliente)
                                <option selected value="{{ $c->id }}">{{ $c->nome }}</option>
                            @else
                                <option value="{{ $c->id }}">{{ $c->nome }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="cliente">Serviço</label>
                    <select class="form-control" id="servico" name="servico">
                        @foreach ($servicos as $s)
                            @if ($s->id == $orden_servico->id_servico)
                                <option selected value="{{ $s->id }}">{{ $s->nome }}</option>
                            @else
                                <option value="{{ $s->id }}">{{ $s->nome }}</option>
                            @endif 
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <textarea class="form-control" id="descricao" name="descricao" rows="3">{{ $orden_servico->descricao }}</textarea>
                </div>

                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" id="status" name="status">
                        @if ($orden_servico->status == 'Orçamento')
                            <option selected value="Orçamento">Orçamento</option>
                            <option value="Realizando">Realizando</option>
                            <option value="Cancelada">Cancelada</option>
                            <option value="Concluída">Concluída</option>
                        @endif
                        @if ($orden_servico->status == 'Realizando')   
                            <option value="Orçamento">Orçamento</option>
                            <option selected value="Realizando">Realizando</option>
                            <option value="Cancelada">Cancelada</option>
                            <option value="Concluída">Concluída</option>
                        @endif
                        @if ($orden_servico->status == 'Cancelada')   
                            <option value="Orçamento">Orçamento</option>
                            <option value="Realizando">Realizando</option>
                            <option selected value="Cancelada">Cancelada</option>
                            <option value="Concluída">Concluída</option>
                        @endif
                        @if ($orden_servico->status == 'Concluída')   
                            <option value="Orçamento">Orçamento</option>
                            <option value="Realizando">Realizando</option>
                            <option value="Cancelada">Cancelada</option>
                            <option selected value="Concluída">Concluída</option>
                        @endif
                    </select>
                </div>

                <div class="form-group">
                    <label for="prazo_estimado">Prazo Estimado</label>
                    <input type="date" class="form-control" id="prazo_estimado" name="prazo_estimado" value="{{ $orden_servico->prazo_estimado }}">
                </div>
                
                <button type="submit" class="btn btn-primary">Atualizar</button>
            </form>
           
        </div>
    </div>
</div>
@endsection

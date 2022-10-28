@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
        
            @if ($message = Session::get('failed'))
                <div class="alert alert-danger">
                    <p>{{ $message }}</p>
                </div>
            @endif

            <div class="row">
                <div class="col-4">
                    <a href="{{ route('ordens.create') }}" class="btn btn-primary">Nova OS +</a>
                </div>
            </div>

            <br/>

            <div class="table-responsive-sm">
                <table class="table" id="table-ordens">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Cliente</th>
                        <th scope="col">Serviço</th>
                        <th scope="col">Status</th>
                        <th width="350px"></th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($ordens as $o)
                            @if ($o->status == 'Concluída')
                                <tr style="background-color: green; color: #fff;">
                            @elseif ($o->status == 'Cancelada')
                                <tr style="background-color: red; color: #fff;">
                            @else
                                <tr>
                            @endif
                                    <th scope="row">{{ $o->id_ordem }}</th>
                                    <td>{{ $o->nome_cliente }}</td>
                                    <td>{{ $o->nome_servico }}</td>
                                    <td>{{ $o->status }}</td>
                                    <td>
                                        <a href="{{ route('ordens.edit', $o->id_ordem) }}" class="btn btn-warning" style="float: left">Editar</a>
                                        
                                        @if ($o->status != 'Concluída')
                                            <a href="{{ route('ordens.finish', $o->id_ordem) }}" class="btn btn-success" style="float: left">Concluir</a>
                                        @endif

                                        <a href="{{ route('ordens.generate', $o->id_ordem) }}" class="btn btn-primary" style="float: left">Imprimir</a>

                                        <form action="{{ route('ordens.destroy', $o->id_ordem) }}" style="float: left" method="POST">
                                            @csrf
                                            @method('delete')

                                            <button type="submit" class="btn btn-danger">Remover</button>
                                        </form>
                                    </td>
                                </tr>
                        @empty
                                <tr>
                                    <td>Nenhum cliente cadastrado</td>
                                </tr>
                        @endforelse
                    </tbody>
                  </table>
                  {{ $ordens->links() }}
              </div>
        </div>
    </div>
</div>

@endsection




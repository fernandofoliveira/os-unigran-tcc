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
                    <a href="{{ route('servicos.create') }}" class="btn btn-primary">Novo Serviço +</a>
                </div>
            </div>

            <br/>

            <div class="table-responsive-sm">
                <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Preço</th>
                        <th width="200px"></th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($servicos as $s)
                            <tr>
                                <th scope="row">{{ $s->id }}</th>
                                <td>{{ $s->nome }}</td>
                                <td>{{ $s->preco }}</td>
                                <td>
                                    <a href="{{ route('servicos.edit', [$s]) }}" class="btn btn-warning">Editar</a>
                                    <form action="{{ route('servicos.destroy', $s->id) }}" style="float: right" method="POST">
                                        @csrf
                                        @method('delete')

                                        <button type="submit" class="btn btn-danger">Remover</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td>Nenhum serviço cadastrado</td>
                            </tr>
                        @endforelse
                      
                    </tbody>
                  </table>
              </div>
        </div>
    </div>
</div>
@endsection

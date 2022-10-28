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
                    <a href="{{ route('clientes.create') }}" class="btn btn-primary">Novo Cliente +</a>
                </div>
            </div>

            <br/>

            <div class="table-responsive-sm">
                <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">CPF</th>
                        <th scope="col">Whatsapp</th>
                        <th scope="col">Email</th>
                        <th width="200px"></th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($clientes as $c)
                            <tr>
                                <th scope="row">{{ $c->id }}</th>
                                <td>{{ $c->nome }}</td>
                                <td>{{ $c->cpf }}</td>
                                <td>{{ $c->whatsapp }}</td>
                                <td>{{ $c->email }}</td>
                                <td>
                                    <a href="{{ route('clientes.edit', [$c]) }}" class="btn btn-warning">Editar</a>
                                    <form action="{{ route('clientes.destroy', $c->id) }}" style="float: right" method="POST">
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
              </div>
        </div>
    </div>
</div>
@endsection

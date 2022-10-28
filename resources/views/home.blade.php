@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>Bem-vindo ao sistema!</p>
                </div>
            </div>

            <div class="row mt-5 ">
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 text-center " >
                    <div class="col-data shadow p-3 mb-5 rounded d-flex align-items-center justify-content-center flex-column" style="background-color: red; color: #fff; width: 100%; min-height: 180px;">
                        <h3>Serviços</h3>
                        <h1>{{ $qtServicos }}</h1>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 text-center">
                    <div class="col-data shadow p-3 mb-5 rounded d-flex align-items-center justify-content-center flex-column" style="background-color: blue; color: #fff; width: 100%; min-height: 180px;">
                        <h3>Clientes</h3>
                        <h1>{{ $qtClientes }}</h1>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 text-center">
                    <div class="col-data shadow p-3 mb-5 rounded d-flex align-items-center justify-content-center flex-column" style="background-color: green; color: #fff; width: 100%; min-height: 180px;">
                        <h3>Ordens de Serviço</h3>
                        <h1>{{ $qtOrdensServico }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

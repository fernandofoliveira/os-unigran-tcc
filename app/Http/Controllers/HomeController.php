<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\OrdemServico;
use App\Servico;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $servicos = Servico::all();
        $qtServicos = count($servicos);

        $clientes = Cliente::all();
        $qtClientes = count($clientes);

        $ordensServico = OrdemServico::all();
        $qtOrdensServico = count($ordensServico);

        return view('home', compact('qtServicos', 'qtClientes', 'qtOrdensServico'));
    }
}

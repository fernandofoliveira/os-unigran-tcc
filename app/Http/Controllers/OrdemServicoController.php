<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\OrdemServico;
use App\Servico;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class OrdemServicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ordens = DB::table('ordem_servicos')
        ->select('ordem_servicos.id as id_ordem', 'servicos.nome as nome_servico', 'clientes.nome as nome_cliente', 'ordem_servicos.status')
        ->join('clientes', 'ordem_servicos.id_cliente', '=', 'clientes.id')
        ->join('servicos', 'ordem_servicos.id_servico', '=', 'servicos.id')
        ->paginate(5);

        return view('ordens-servico.index', compact('ordens'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes = Cliente::all();
        $servicos = Servico::all();

        return view('ordens-servico.create', compact('clientes', 'servicos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        if($request->get('status') == "Concluída") {
            OrdemServico::create([
                'id_cliente'        => $request->get('cliente'),
                'id_servico'        => $request->get('servico'),
                'descricao'         => $request->get('descricao'),
                'status'            => $request->get('status'),
                'prazo_estimado'    => $request->get('prazo_estimado'),
                'data_conclusão'    => Carbon::now()->format('d-m-Y'),
            ]);
        } else {
            OrdemServico::create([
                'id_cliente'        => $request->get('cliente'),
                'id_servico'        => $request->get('servico'),
                'descricao'         => $request->get('descricao'),
                'status'            => $request->get('status'),
                'prazo_estimado'    => $request->get('prazo_estimado'),
            ]);
        }
        

        return redirect()->route('ordens.index')
                            ->with('success', 'OS cadastrada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $orden_servico = OrdemServico::find($id);
        $clientes = Cliente::all();
        $servicos = Servico::all();
        
        return view('ordens-servico.edit', compact('orden_servico', 'clientes', 'servicos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $os = OrdemServico::find($id);

        if($request->get('status') == "Concluída") {
            $os->update([
                'id_cliente'        => $request->get('cliente'),
                'id_servico'        => $request->get('servico'),
                'descricao'         => $request->get('descricao'),
                'status'            => $request->get('status'),
                'prazo_estimado'    => $request->get('prazo_estimado'),
                'data_conclusão'    => Carbon::now()->format('d-m-Y'),
            ]);
        } else {
            $os->update([
                'id_cliente'        => $request->get('cliente'),
                'id_servico'        => $request->get('servico'),
                'descricao'         => $request->get('descricao'),
                'status'            => $request->get('status'),
                'prazo_estimado'    => $request->get('prazo_estimado'),
            ]);
        }
        

        return redirect()->route('ordens.index')
                            ->with('success', 'OS atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $os = OrdemServico::find($id);

        $os->delete();

        return redirect()->route('ordens.index')
            ->with('success', 'Ordem de serviço deletada com sucesso!');
    }

    public function finish($id)
    {
        $os = OrdemServico::find($id);

        $os->update([
            'status' => 'Concluída'
        ]);

        return redirect()->route('ordens.index')
            ->with('success', 'Ordem de serviço finalizada com sucesso!');
    }

    public function generate($id) {
        
        $ordem = DB::table('ordem_servicos')
        ->select('ordem_servicos.id as id_ordem', 'ordem_servicos.descricao', 'ordem_servicos.prazo_estimado', 'ordem_servicos.status', 'ordem_servicos.data_conclusão', 'servicos.nome as nome_servico', 'clientes.nome as nome_cliente', 'ordem_servicos.status')
        ->join('clientes', 'ordem_servicos.id_cliente', '=', 'clientes.id')
        ->join('servicos', 'ordem_servicos.id_servico', '=', 'servicos.id')
        ->where('ordem_servicos.id', $id)
        ->get();

        return \PDF::loadView('ordens-servico.ordem_gerada', compact('ordem'))
                ->stream('ordem-de-servico.pdf');
    }
}

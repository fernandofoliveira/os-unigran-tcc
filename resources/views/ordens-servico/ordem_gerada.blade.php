<style>
    #assinatura {
        width: 40%;
    }
</style>

{{-- {{ dd($ordem) }} --}}

<div class="titulo">
    <h1>Ordem de Serviço - {{ $ordem[0]->id_ordem }}</h1>
    <hr/>

    <br/>
    
    <h3>Cliente: {{ $ordem[0]->nome_cliente }}</h3>
    
    <h3>Serviço: {{ $ordem[0]->nome_servico }}</h3>

    <h3>Descrição: {{ $ordem[0]->descricao }}</h3>

    <h3>Prazo Estimado: {{ $ordem[0]->prazo_estimado }}</h3>

    <h3>Status: {{ $ordem[0]->status }}</h3>

    @if ($ordem[0]->status == 'Concluída')
        <h3>Data Conclusão: {{ $ordem[0]->data_conclusão }}</h3>
    @endif

    <br/>
    <br/>
    <br/>
    <br/>

    <hr id="assinatura">

    <h4><center>Assinatura do Cliente</center></h4>

    <br/>
    <br/>

    <hr id="assinatura">

    <h4><center>Assinatura do Técnico</center></h4>
</div>
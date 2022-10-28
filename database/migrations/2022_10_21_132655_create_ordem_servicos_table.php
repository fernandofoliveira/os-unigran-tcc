<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdemServicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordem_servicos', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('id_cliente');
            $table->foreign('id_cliente')->references('id')->on('clientes')->onDelete('cascade');

            $table->unsignedBigInteger('id_servico');
            $table->foreign('id_servico')->references('id')->on('servicos')->onDelete('cascade');

            $table->string('descricao');
            $table->string('status');
            $table->string('prazo_estimado');
            $table->string('data_conclusão')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ordem_servicos');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendaItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venda_itens', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('referencia', 6);
            $table->string('nome', 300);
            $table->float('preco', 10, 2);
            $table->text('fornecedor');
            
            $table->bigInteger('produto_id')
                    ->unsigned();
            $table->foreign('produto_id')
                    ->references('id')
                    ->on('produtos');
            
            $table->bigInteger('venda_id')
                    ->unsigned();
            $table->foreign('venda_id')
                    ->references('id')
                    ->on('vendas');
                    
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
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
        Schema::dropIfExists('venda_itens');
    }
}

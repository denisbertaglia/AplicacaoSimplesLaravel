<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutoFornecedorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produto_fornecedor', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->bigInteger('produto_id')
                    ->unsigned();
            $table->bigInteger('fornecedor_id')
                    ->unsigned();
                    
            $table->foreign('produto_id')
                    ->references('id')
                    ->on('produtos');

            $table->foreign('fornecedor_id')
                    ->references('id')
                    ->on('fornecedores');
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produtos');
    }
}


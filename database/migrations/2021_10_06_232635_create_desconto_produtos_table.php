<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDescontoProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('desconto_produtos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('produto_id');
            $table->foreign('produto_id')->references('id')->on('produtos')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->unsignedBigInteger('campanha_id');
            $table->foreign('campanha_id')->references('id')->on('campanhas')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->unsignedDecimal('valor')->default(0.0);
            $table->unsignedDecimal('subtotal')->default(0.0);
            $table->unsignedDecimal('subtotalComDesconto')->default(0.0);
            $table->unsignedBigInteger('quantidade')->default(0);

            
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
        Schema::dropIfExists('descontos_produtos');
    }
}

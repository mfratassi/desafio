<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampanhasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campanhas', function (Blueprint $table) {
            $table->id();

            $table->string("nome", 200)->default('Campanha');

            $table->boolean('ativo')->default(true);

            $table->unsignedBigInteger('grupo_id')
                ->unique()
                ->nullable()
                ->default(null);
            
            $table->foreign('grupo_id')->references('id')->on('grupos_cidades')
                ->cascadeOnUpdate()
                ->nullOnDelete();

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
        Schema::dropIfExists('campanhas');
    }
}

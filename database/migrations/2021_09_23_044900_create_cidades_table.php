<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cidades', function (Blueprint $table) {
            $table->id();
            $table->string("nome", 200);
        
            $table->unsignedBigInteger('estado_id')->nullable()->default(null);
            $table->foreign('estado_id')->references('id')->on('estados')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            
            $table->unsignedBigInteger('grupo_id')->nullable()->default(null); 
            $table->foreign('grupo_id')
                    ->references('id')
                    ->on('grupos_cidades')
                    ->nullOnDelete()
                    ->cascadeOnUpdate();
            
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
        Schema::dropIfExists('cidades');
    }
}

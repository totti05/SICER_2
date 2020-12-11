<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVariablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('sicerl5')->create('variables', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('variable', 100);
            $table->string('nombre_var_bd', 100)->nullable();
            $table->string('neumonico', 100);
            $table->string('unidad', 100);
            $table->text('descripcion');
            $table->text('calculo_variable')->nullable();
            $table->text('calculo_rango_ref')->nullable();
            $table->decimal('referencia_inferior', 8, 4)->nullable();
            $table->decimal('referencia_superior', 8, 4)->nullable();
            $table->decimal('referencia_operativa', 8, 4)->nullable();
            $table->decimal('rango_ideal', 8, 4)->nullable();
            $table->decimal('min_grafica', 8, 4)->nullable();
            $table->decimal('max_grafica', 8, 4)->nullable();
            $table->string('modulo', 100)->nullable();
            $table->string('tabla_bd', 100)->nullable();
            $table->text('comentario')->nullable();
            $table->timestamps();
            
            $table->engine = 'MyISAM';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('sicerl5')->dropIfExists('variables');
    }
}

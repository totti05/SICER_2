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
        Schema::connection('sicerl4')->create('variables', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('variable', 100);
            $table->string('neumonico', 100);
            $table->string('unidad', 100);
            $table->text('descripcion');
            $table->text('calculo');
            $table->string('procedencia', 100);
            $table->string('procedencia_area', 100);
            $table->string('tabla_bd', 100);
            $table->text('comentario');
            $table->decimal('rango_ideal', 8, 4);
            $table->decimal('rango_inferior', 8, 4);
            $table->decimal('rango_superior', 8, 4);
            $table->decimal('banda_inferior', 8, 4);
            $table->decimal('bando_superior', 8, 4);           
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
        Schema::connection('sicerl4')->dropIfExists('variables');
    }
}

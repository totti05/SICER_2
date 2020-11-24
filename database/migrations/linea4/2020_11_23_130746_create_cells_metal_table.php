<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCellsMetalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('sicerl4')->create('cells_metal', function (Blueprint $table) {
            $table->smallInteger('celda');
            $table->date('dia');
            $table->mediumInteger('eficTrasegado');
            $table->decimal('nivelMetal', 6, 2);
            $table->smallInteger('fe');
            $table->decimal('si', 8, 2);
            $table->double('desvNM', 8, 2);
            $table->double('purezaM', 8, 2);
            
            $table->engine = 'MyISAM';

            $table->primary(['celda', 'dia']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('sicerl4')->dropIfExists('cells_metal');
    }
}

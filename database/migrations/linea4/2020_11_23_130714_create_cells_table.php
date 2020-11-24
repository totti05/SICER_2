<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCellsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('sicerl4')->create('cells', function (Blueprint $table) {
            $table->smallInteger('celda');
            $table->date('dia');
            $table->decimal('dsr', 8, 4);
            $table->decimal('duracionEA', 6, 2);
            $table->smallInteger('edad');
            $table->smallInteger('numeroEA');
            $table->decimal('vMaxEA', 8, 4);
            $table->decimal('automFl', 8, 4);
            $table->decimal('manualFl', 8, 4);
            $table->integer('criolita');
            $table->integer('criolitaArrq');
            $table->decimal('voltaje', 8, 4);
            $table->decimal('vref', 8, 4);
           

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
        Schema::connection('sicerl4')->dropIfExists('cells');
    }
}

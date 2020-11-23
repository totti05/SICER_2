<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCruciblesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('sicerl5')->create('crucibles', function (Blueprint $table) {
            $table->smallInteger('celda');
            $table->date('dia');
            $table->double('HierroCrisol', 8, 2);
            $table->double('PurezaCrisol', 8, 2);
            $table->double('SilicioCrisol', 8, 2);
            $table->double('ConsumoBFCrisol', 8, 2);
            $table->double('ConsumoMDCrisol', 8, 2);
            
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
        Schema::connection('sicerl5')->dropIfExists('crucibles');
    }
}

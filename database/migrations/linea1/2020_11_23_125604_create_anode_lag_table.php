<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnodeLagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('sicerl1')->create('anode_lag', function (Blueprint $table) {
            $table->smallInteger('celda');
            $table->date('dia');
            $table->mediumInteger('atrasoCN');
            $table->decimal('diasAtraCN', 6, 2);
            $table->smallInteger('atrasoBanqueo');
            $table->decimal('diasAtraBanqueo', 8, 2);
            $table->double('atrasoColada', 8, 2);
            
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
        Schema::connection('sicerl1')->dropIfExists('anode_lag');
    }
}

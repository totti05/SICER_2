<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnodeFailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('sicerl1')->create('anode_fails', function (Blueprint $table) {
           
            $table->smallInteger('celda');
            $table->date('dia');
            $table->double('Bo', 8, 2);
            $table->double('Raj', 8, 2);
            $table->double('Bim', 8, 2);
            $table->double('Tetas', 8, 2);
            $table->double('Ba', 8, 2);
            $table->double('BoCN', 8, 2);
            $table->double('AnodoExtra', 8, 2);
 
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
        Schema::connection('sicerl1')->dropIfExists('anode_fails');
    }
}

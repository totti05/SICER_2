<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAluminasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('sicerl1')->create('aluminas', function (Blueprint $table) {
            $table->smallInteger('celda');
            $table->date('dia');
            $table->mediumInteger('golpesAlumina');
            $table->decimal('duracionTk', 6, 2);
            $table->smallInteger('numeroTk');
            $table->decimal('golpeUso', 8, 2);
            $table->double('alimentadores', 8, 2);

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
        Schema::connection('sicerl1')->dropIfExists('aluminas');
    }
}

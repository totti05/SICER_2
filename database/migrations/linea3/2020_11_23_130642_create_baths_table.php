<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBathsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('sicerl3')->create('baths', function (Blueprint $table) {
            $table->smallInteger('celda');
            $table->date('dia');
            $table->double('temperatura', 8, 2);
            $table->double('acidez', 8, 2);
            $table->double('NivelDeBanio', 8, 2);
            $table->double('BañoFD', 8, 2);
            $table->double('DesvTB', 8, 2);
            $table->double('DesvAB', 8, 2);
            $table->double('DesvNB', 8, 2);
            $table->double('CalcioB', 8, 2);
            $table->double('CantidadB', 8, 2);
            $table->double('CalidadB', 8, 2);
            
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
        Schema::connection('sicerl3')->dropIfExists('baths');
    }
}

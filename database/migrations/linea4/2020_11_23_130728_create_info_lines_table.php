<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoLinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('sicerl4')->create('info_lines', function (Blueprint $table) {
            $table->date('dia');
            $table->double('CorrienteP', 8, 2);
            $table->double('CorrienteR', 8, 2);
            $table->double('PotenciaNo', 8, 2);
            $table->double('PotenciaNe', 8, 2);
            $table->double('FrecEA', 8, 2);
            $table->double('Celdas_Desn', 8, 2);
            $table->double('CeldasConectadas', 8, 2);
            $table->double('Derrame_Al', 8, 2);
            $table->double('Tolvas_Vacias', 8, 2);
            $table->double('Casco_Rojo', 8, 2);
            $table->double('Desinc', 8, 2);
            $table->double('Incorp', 8, 2);
            $table->double('Inestables', 8, 2);
            $table->double('FDESN', 8, 2);
            $table->double('Celdas_DesinHierro', 8, 2);
            $table->double('Celdas_DesinBarraP', 8, 2);
            $table->double('Celdas_DesinParedP', 8, 2);
            $table->double('Celdas_DesinProg', 8, 2);
            $table->double('FactorServGruas', 8, 2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('sicerl4')->dropIfExists('info_lines');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModuleVariableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('module_variable', function (Blueprint $table) {
            $table->unsignedBigInteger('module_id');
            $table->unsignedBigInteger('variable_id');
            $table->string('descripcion', 100)->nullable(); //filtro o variable de operacion 
            $table->timestamps();
            $table->foreign('variable_id')->references('id')->on('variables');
            $table->foreign('module_id')->references('id')->on('modules');
            
        });

      
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('module_variable');
    }
}

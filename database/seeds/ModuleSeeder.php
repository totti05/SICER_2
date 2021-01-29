<?php

use Illuminate\Database\Seeder;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('sicerl5')->table('modules')->insert(
            [
                'id'=> 1,
                'nombre' => 'celdas_conectadas', 
                
            ]);
        DB::connection('sicerl5')->table('modules')->insert(
            [
                'id'=> 2,
                'nombre' => 'evolucion', 
                
            ]);
        DB::connection('sicerl5')->table('modules')->insert(
            [
                'id'=> 3,
                'nombre' => 'falla_anodos', 
                
            ]);
        DB::connection('sicerl5')->table('modules')->insert(
            [
                'id'=> 4,
                'nombre' => 'bano_electrolitico', 
                
            ]);
        DB::connection('sicerl5')->table('modules')->insert(
            [
                'id'=> 5,
                'nombre' => 'info_linea', 
                
            ]);
        DB::connection('sicerl5')->table('modules')->insert(
            [
                'id'=> 6,
                'nombre' => 'metal_crisol', 
                
            ]);
    }
}

<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Events\Dispatcher;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;
use Illuminate\Support\Facades\DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Dispatcher $events)
    {
        
        $events->listen(BuildingMenu::class, function (BuildingMenu $event) {
            $fecha1=date("Y-m-d");
            $fecha= date("Y-m-d",strtotime($fecha1."- 1 day"));
            $celdas = DB::connection('reduccionl5')->table('diariocelda')
            ->where('dia',  $fecha)
            ->where('enServicio', '=', 1)
            ->select('celda')
            ->get();
    
            $celdas = sizeof($celdas) ;
           
            $event->menu->addAfter('MENU', [
            'label'       => $celdas,            
            'label_color' => 'success',
            'url'         => 'home',
            'icon_color' => 'yellow',
            'key'         => 'celdass',
            'text'        => 'Celdas conectadas',
            'icon'        => 'fa fa-table',
     
            ]);
            
        
            
        });
    }
}

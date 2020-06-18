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
            $celdas = DB::connection('reduccion')->table('diariocelda')
            ->whereYear('dia','2020')
            ->whereMonth('dia','03')
            ->whereDay('dia', '26')
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

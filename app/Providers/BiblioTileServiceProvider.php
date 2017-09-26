<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;
use App\Traqc;
use Illuminate\Support\Facades\Log;

class BiblioTileServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;



    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()


    {

        $tr = new Traqc\Traqc();

        foreach ($tr->modules() as $module){
           // Log::info('$tr'.$module->title);
            //Log::info('$tr'.$module->description);
            //Log::info('$tr'.$module->icon);

        }


        $this->app->bind('bibliotiletitle',function (){
            return 'Rapports d\'inspection';
        });

        $this->app->bind ('$bibliotiletitle',function (){
        return 'Rapports d\'inspection!!!';
    },true);
        $this->app->when('App\Http\Controllers\Frontend\User\DashboardController')
            ->needs('$biblioit')
            ->give(24);
    }

}

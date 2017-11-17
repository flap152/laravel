<?php

use Illuminate\Support\Facades\Request;
use App\Http\Controllers\Frontend\TempMonitorController;
/**
 * TemperatureMonitor Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */

Route::get('/tempIndex', 'TempMonitorController@index');


Route::post('/tempShow', function() {
    $remorqueId = request('remorqueId');
    return (new TempMonitorController)->show($remorqueId);
});

Route::get('/tempShow/{remorqueId}', 'TempMonitorController@show');






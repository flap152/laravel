<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/flap', function(){



//billingrecords,changements,comptestelcos,customers,devicecategories,devicemodels,devices,devicevendor,fminfo,forfaits,phoneplan,productlogins,produits,quotas,report_bell_rerate,settingsandvalues,simissues,sims,sims2,tabletconfigtypes,tabletconnjob,tabletsupportinfo,tblutil,telcos,telus_usagedataraw,usagedataraw,vehicles
    $mytables = array('billingrecords','changements','comptestelcos',
        'fminfo','forfaits','phoneplan','productlogins',
        'quotas','report_bell_rerate','simissues','tabletconfigtypes','tabletconnjob',
        'tabletsupportinfo','tblutil','telcos','telus_usagedataraw','usagedataraw');
    //$mytables = array(//'customers','devicecategories','devicemodels',
        //'devices','devicevendor','produits',
        //'settingsandvalues','simissues','sims','vehicles');
    foreach ($mytables as $mytable){
      //  Artisan::call( 'krlove:generate:model',  ['class-name' => ucfirst( str_singular($mytable)), '-tn'=>$mytable,'-cn'=>'psoftadmin1' ,'-op'=>'psoftadmin','-ns'=>'psoftadmin'  ] );
    }


    return view('flap');
});

//Auth::routes();


Route::get('/home', 'HomeController@index');

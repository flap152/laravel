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
    return view('home');
 //   return redirect('fmroorders');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('companies','CompaniesController@index');
Route::get('companies/{id}','CompaniesController@show');
Route::get('companies/create','CompaniesController@create');


Route::get('/flap', function ()
{
    return view('flap');
});

Route::get('/flap2', function ()
{
    return view('flap2');
});

Route::get('/flap3', function ()
{
    return view('flap3');
});


Route::get('fmroorders/{id}/tofm', 'FmroorderController@tofm');
Route::get('getfmclosedorders', 'FmroorderController@getfmclosedorders');
Route::get('fmroorders/{id}/getfmstatus', 'FmroorderController@getfmstatus');
Route::get('fmroorders/{id}/fmroorderresult', 'FmroorderresultController@show');


Route::resource('fmroorders','FmroorderController');

//Route::get('fmroorderresults/{OrderNumber}','FmroorderresultController@show');

Route::resource('fmroorderresults','FmroorderresultController');





/*
// route to show our edit form
Route::get('fmroorder/edit/{id}', array('as' => 'fmroorder.edit', function($id)
{
    // return our view and Nerd information
    return View::make('fmroorder.edit') // FFLLAAPP: pulls app/views/nerd-edit.blade.php
    ->with('fmroorder', \App\Fmroorder::find($id));
}));

// route to process the form
Route::post('fmroorder/edit', function() {
    // process our form
});
*/

?>

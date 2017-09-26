<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Biblio\Document;
use Illuminate\Database\Eloquent;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

//Route::middleware('web')->get('/cacheddocs', function (Request $request) {
Route::middleware('api')->get('/cacheddocs', function (Request $request) {
    $dd = Document::whereNotNull('localpath')->whereDate('created_at','>','2017-08-25')->get(['id']);
    return response()->json(['status'=>'ok', 'results'=>$dd->pluck('id')]);
   // return response()->json(['status'=>'ok', 'results'=>[55,53,49,23,51,47,48,61,60,59,58,57,56]]);
});
<?php


use Illuminate\Support\Facades\Route;
use \Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
//use SendgridParse;
use App\Models\Biblio\Document;
use App\Models\Biblio\DocumentType;
use App\Models\Biblio\Vehicule;

/**
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */

//Route::get('/', 'FrontendController@index')->name('index');
//Route::get('macros', 'FrontendController@macros')->name('macros');
Route::get('contact', 'ContactController@index')->name('contact');
Route::post('contact/send', 'ContactController@send')->name('contact.send');

Route::group(['middleware'=>'api'],function() {
    Route::post('/emailparse', function (Request $request) {
        $uri = $request->path();
        $parsed = new SendgridParse();
        Log::info('received email parsea:'. $uri);//. $_REQUEST);
        // Le email est sensé être ititré "docname - unit name - timestamp"
        $subjectPieces = explode(" - ", $parsed->subject);
        if (!$subjectPieces){
            //TODO: le délimiteur n'a pas été reconnu
        }
        //TODO: Gérer: il n y a pas 3 parties au subject
        $docName = $subjectPieces[0];
        $unitName = $subjectPieces[1];
        $docTime = $subjectPieces[2];
        $docType = new DocumentType;
        $docType->firstOrCreate(['title' => $docName],['title' => $docName])->save();
        $camion = new Vehicule; $camion->firstOrCreate(['name' => $unitName], ['name' => $unitName])->save();
        Log::info('received email docType:' . serialize($docType));//. $_REQUEST);
        Log::info('received email camion:' . serialize($camion));//. $_REQUEST);

        foreach ($parsed->attachments as $attachment) {
            //$attachment;
            $doc = new Document;
            $doc->document_type_id = 1; // $docType->id;
            $doc->vehicule_id = 1; //$camion-> id;
            $doc->title = $docName;
            $doc->document_date = \Carbon\Carbon::now();
             Log::info('received email pa    rse b:' . serialize($attachment));//. $_REQUEST);
            Log::info('received email doc:' . serialize($doc));//. $_REQUEST);
            $filename = $attachment['name'];
            Log::info('received email parse c:' . serialize($attachment));//. $_REQUEST);
            $filename =  'biblio/'. $doc->document_date->format('Ymd-hms'). $filename  ;
            $doc->localpath  =storage_path($filename);
            $doc->save();
           Log::info('received email parse ddd:' . $attachment['name']);//. $_REQUEST);

            move_uploaded_file($attachment['tmp_name'],storage_path($filename));
            Log::info('received email parse saved file:'. $filename  );//. $_REQUEST);
        }
        return response('REUSSI1');
    });
    Route::get('/emailparse', function () {
        \Illuminate\Support\Facades\Log::info('received email parse:');// . $_REQUEST);
        return response('REUSSI2');
    });//
});

/*
 * These frontend controllers require the user to be logged in
 * All route names are prefixed with 'frontend.'
 */
Route::group(['middleware' => 'auth'], function () {
    Route::group(['namespace' => 'User', 'as' => 'user.'], function () {
        /*
         * User Dashboard Specific
         */
        Route::get('dashboard', 'DashboardController@index')->name('dashboard');

        /*
         * User Account Specific
         */
        Route::get('account', 'AccountController@index')->name('account');

        /*
         * User Profile Specific
         */
        Route::patch('profile/update', 'ProfileController@update')->name('profile.update');
    });

    Route::get('/', 'VehiculeController@index')->name('index');
    Route::get('/vehicules', 'VehiculeController@index');
    Route::get('/documents', 'DocumentController@index');
    Route::get('/vehicule/{id}/documents', 'DocumentController@listVehiculeDocuments');
    Route::get('/vehicule/{vehiculeId}/document/{id}', 'DocumentController@showThisDocument');
});
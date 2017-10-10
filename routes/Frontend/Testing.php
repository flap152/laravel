<?php

/**
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */
Route::get('/flap', function () {
    // Servir le PDF
    $filename = 'test.pdf';
    $filename =  'biblio/'. $filename ;
    $path = storage_path($filename);

    return Response::make(file_get_contents($path), 200, [
        'Content-Type' => 'application/pdf',
        'Content-Disposition' => 'inline; filename="'.$filename.'"'
    ]);


    return view('frontend/flap');
});

Route::post('/flap2', function () {
    // PDF email callback
    // on obtient les infos dans le request
    // on sauvegarde le fichier dans le storage
    // Ajouter la ligne dans
    // On retourne succès, j'imagine

    //return response()->isOk();
    return view('frontend/flap2');
});




Route::get('/flap3/{id}', 'DocumentController@showThisDocument');
Route::get('/flap3', function () {
    return view('frontend/flap3');
});

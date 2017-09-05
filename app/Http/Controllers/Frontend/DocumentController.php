<?php
/**
 * Created by PhpStorm.
 * User: Loriane
 * Date: 2017-07-27
 * Time: 14:07
 */

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Biblio\Document;

class DocumentController extends Controller
{
    //Lister tous les documents
    public function index(){

        $documents = Document::paginate(2);

        return view('frontend.biblio.documents-list')->with(array('documents' => $documents));
    }

    //Lister les documents par véhicule
    public function listVehiculeDocuments($vehiculeId)
    {
        $documents = Document::with('vehicule')
                     ->where('vehicule_id', '=', $vehiculeId)
                     ->orderBy('document_date', 'desc')
                     ->get();

        if($documents->count() == 1){

            return redirect()->action('Frontend\DocumentController@show', ['id' => $vehiculeId]);
        }
        
        return view('frontend.biblio.documents-list')->with('documents', $documents);
    }

    public function show($id){

        $document = Document::with('vehicule')->find($id);
        
        return view('frontend.biblio.document-show')->with('document', $document);
    }

    public function showAttachment($id){

        $document = Document::find($id);

        // Servir le PDF

        if(!file_exists($document->localpath)){

            abort(404,trans('http.404.file_not_found.description'));
        }

        $path = $document->localpath;

        return response(file_get_contents($path))
            ->header('Content-Type','application/pdf')
            ->header('Content-Disposition', 'inline; filename="'.$path.'"');
    }
}

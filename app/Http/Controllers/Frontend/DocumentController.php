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
use App\Models\Biblio\Vehicule;


class DocumentController extends Controller
{
    public function index(){

        $documents = Document::all();

        return view('frontend.biblio.documents-list')->with(array('documents' => $documents));
    }

    public function listVehiculeDocuments($vehiculeId){

        $documents = Document::with('vehicule')
            ->where('vehicule_id', '=', $vehiculeId)
            ->orderBy('document_date', 'desc')
            ->get();

        return view('frontend.biblio.documents-list')->with('documents', $documents);
    }

    public function showThisDocument($vehiculeId, $id){

        $document = Document::with('vehicule')
            ->where('vehicule_id', '=', $vehiculeId)
            ->where('id', '=', $id)
            ->get();

        return view('frontend.biblio.document-show')->with('documents', $document);
    }

    public function showThisDocument($id){

        $document = Document::with('vehicule')->find($id);

        // Servir le PDF

        //$filename = 'Doc' . $document->id . ".pdf";
        //$filename =  'biblio/'. $filename ;
        //$path = storage_path($filename);
        $path = $document->localpath;



        return response(file_get_contents($path))
            ->header('Content-Type','application/pdf')
            ->header('Content-Disposition', 'inline; filename="'.$path.'"');

        /*   return Response::make(file_get_contents($path), 200, [
               'Content-Type' => 'application/pdf',
               'Content-Disposition' => 'inline; filename="'.$filename.'"'
           ]);
   */
        //return view('frontend.biblio.documents')->with(array('documents' => $documents));
    }
}

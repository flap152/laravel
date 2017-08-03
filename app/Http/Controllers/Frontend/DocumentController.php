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

    public function showVehiculeDocuments($vehiculeId){

        $documents = Document::with('vehicule')
            ->where('vehicule_id', '=', $vehiculeId)
            ->orderBy('document_date', 'desc')
            ->get();

        return view('frontend.biblio.document-show')->with('documents', $documents);
    }

    public function showVehiculeDocument($vehiculeId, $id){

        $document = Document::with('vehicule')
            ->where('vehicule_id', '=', $vehiculeId)
            ->where('id', '=', $id)
            ->get();

        return view('frontend.biblio.document-show')->with('documents', $document);
    }
}
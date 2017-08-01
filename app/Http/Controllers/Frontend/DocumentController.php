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

        return view('frontend.biblio.documents')->with(array('documents' => $documents));
    }

    public function showVehiculeDocuments($id){

        xdebug_break();

        $documents = Document::with('vehicule')->where('vehicule_id', '=', $id)
            ->orderBy('document_date', 'desc')
            ->get();

        return view('frontend.biblio.documents')->with(array('documents' => $documents));
    }
}
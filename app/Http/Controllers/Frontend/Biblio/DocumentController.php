<?php
/**
 * Created by PhpStorm.
 * User: Loriane
 * Date: 2017-07-27
 * Time: 14:07
 */

namespace App\Http\Controllers\Frontend\Biblio;

use App\Http\Controllers\Controller;
use App\Models\Biblio\Document;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

/**
 * Class DocumentController
 * @package App\Http\Controllers\Frontend\Biblio
 */
class DocumentController extends Controller
{
    /**
     * Lister les documents
     * @return View
     */
    public function index(){

        $documents = Document::with('vehicule')->paginate(5);

        return view('frontend.biblio.docs.list')->with('documents', $documents);
    }

    /**
     * Affiche la liste des documents par véhicule
     * @param int $vehiculeId
     * @return View|RedirectResponse
     */
    public function listVehiculeDocuments($vehiculeId)
    {
        $documents = Document::with('vehicule')
            ->where('vehicule_id', '=', $vehiculeId)
            ->orderBy('document_date', 'desc')->paginate(5);

        if($documents->count() == 1){

            return redirect()->action('Frontend\Biblio\DocumentController@show', ['id' => $documents->first()->id]);
        }

        return view('frontend.biblio.docs.list')->with('documents', $documents);
    }

    /**
     *
     * Affiche le document et un lien vers sa pièce jointe
     * @param int $id
     * @return View
     */
    public function show($id){

        $document = Document::with('vehicule')->find($id);
        
        return view('frontend.biblio.docs.show')->with('document', $document);
    }

    /**
     *
     * Affiche la pièce jointe
     * @param int $id
     * @return mixed
     */
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

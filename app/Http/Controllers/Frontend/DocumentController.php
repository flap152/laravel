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
use Illuminate\Database\Eloquent;
use Illuminate\Support\Facades\DB;

class DocumentController extends Controller
{
    //Lister tous les documents
    public function index(){

        //$documents = Document::paginate(2);

        //$documents = DB::table('documents')

        $docsub =
            Document::join('vehicules','documents.vehicule_id','=','vehicules.id')
                ->select('vehicules.id','vehicules.name',DB::raw('max(document_date) as document_date'))
                ->groupBy('vehicules.id')
                ->orderBy('document_date','desc')
                ->limit(5)
                ->get('vehicules.id')
            //->pluck('id')
        ;

       // dd($docsub);

        $documents = Vehicule::select('*')
            ->whereIn('id',$docsub->pluck('id'))
            ->with('documents')


        ->get();//            ->max('documents.document_date');

        $ddd = $documents[0]->documents->max('document_date');

            //dd($documents);
        $documents = Document::with('vehicule')->get();//paginate(14);
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

        //Testing with just text / html output
        //return response("Here I go anain!");

        return response(file_get_contents($path))
            ->header('Content-Type','application/pdf')
            //->header('Content-Disposition', 'attachment; filename="document.pdf"')
            ->header('Content-Disposition', 'inline; ')
            //->header('Content-Disposition', 'attachment; filename="'.$path.'"')
    ;}
}

<?php
namespace App\Http\Controllers\Frontend\BiblioMgmt;
use App\Http\Controllers\Controller;
use App\Traqc\DocumentList;
use Illuminate\View\View;

class DocumentMgmtController extends Controller
{
    /**
     *
     * Lister les documents
     * @return View
     */
    public function index(){

        $docList = new DocumentList;

        $docs = $docList->getDocs();

        return view('frontend.biblio-mgmt.docs.list')->with('docs', $docs);
    }
}
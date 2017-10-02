<?php
/**
 * Created by PhpStorm.
 * User: Loriane
 * Date: 2017-09-25
 * Time: 15:18
 */
namespace App\Http\Controllers\Frontend\BiblioMgmt;
use App\Http\Controllers\Controller;
use App\Traqc\DocumentList;
use Illuminate\View\View;

/**
 * Class FilesMgmtController
 * @package App\Http\Controllers\Frontend\BiblioMgmt
 */
class FilesMgmtController extends Controller
{
    /**
     *
     * Lister les fichiers
     * @var DocumentList $docList
     * @return View
     */
    public function index(){

        $docList = new DocumentList;

        //Obtenir les fichiers
        $fileList = $docList->getFiles();

        return view('frontend.biblio-mgmt.files.list')->with(compact('fileList'));
    }
}
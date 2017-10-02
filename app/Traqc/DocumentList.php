<?php
/**
 * Created by PhpStorm.
 * User: Loriane
 * Date: 2017-09-25
 * Time: 14:41
 */

namespace App\Traqc;

use App\Models\Biblio\Document;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Storage;

/**
 * Class DocumentList
 * @package App\Traqc
 */
class DocumentList
{
    /**
     * Obtenir les fichiers dans le storage
     * @return mixed
     */
    public function getFileStorage(){

        //Files in storage
        $files = Storage::disk('biblio_store')->files();

        if(($key = array_search('biblio/dummy.txt', $files)) !== false) {
            unset($files[$key]);
        }

        return $files;
    }

    /**
     * Obtenir les fichiers avec leurs status valide ou non
     * @return array
     */
    public function getFiles(){

        $files = $this->getFileStorage();

        $fileList = array();

        foreach($files as $file){

            //Nom du fichier
            $fileList[$file]['filename'] = $file;

            //Le timestamp au début
            $fileList[$file]['timestamp'] = date('Ymd-hms', filectime(storage_path('biblio') . '/' . $file));

            //Obtenir du contenu si le fichier est valide
            $fileList[$file]['is_doc_valid'] = Document::where('localpath',
                '=',
                storage_path('biblio') . '/' . $file)
                ->get();
        }

        return $fileList;
    }

    /**
     * //Assigner valide ou non au documents dans la base de données
     * @var $documents Collection
     * @return void
     */
    public function setValidFile(){

        $documents = $this->getDocs();

        foreach ($documents as $doc){

            $fileExists = file_exists($doc->localpath);

            $doc->is_doc_valid = $fileExists;

            $doc->save();
        }
    }

    /**
     * Obtenir les fichiers de la base de données
     * @var $documents Collection
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getDocs(){

        $documents = Document::with('vehicule')->get();

        return $documents;
    }
}
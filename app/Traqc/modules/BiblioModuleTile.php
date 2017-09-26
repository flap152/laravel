<?php
/**
 * Created by PhpStorm.
 * User: Loriane
 * Date: 2017-09-08
 * Time: 13:37
 */

namespace App\Traqc\modules;
use App\Models\Biblio\Document;
use App\Models\Biblio\Vehicule;
use App\Traqc\ModuleTile;
use Carbon\Carbon;

class BiblioModuleTile extends ModuleTile
{
    //Accéder aux modules

    public function __construct()
    {
        parent::__construct();

        $this->title = "Biblio";
        $this->icon = 'fa fa-file-pdf-o';
        $this->link = '/vehicules';
        $this->description = 'à venir'; //$this->getLatest5Documents();
    }

    public function getLatest5Documents(){

        $documents = Document::with('vehicule')->get();

        return $documents;
    }

    static function getLatest30DaysDocuments(){

    }
}
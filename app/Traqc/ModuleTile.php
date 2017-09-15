<?php
/**
 * Created by PhpStorm.
 * User: Loriane
 * Date: 2017-09-08
 * Time: 13:19
 */

namespace App\Traqc;

class ModuleTile
{
    //Description des tuiles - Base pour les classes des modules
    public $title;
    public $icon;
    public $description;
    public $link;


    public function __construct()
    {
        $this->title = "Titre du module";
        $this->icon = "L'icone du module";
        $this->description = "Description du module";
        $this->link = "Lien vers module";
    }
}
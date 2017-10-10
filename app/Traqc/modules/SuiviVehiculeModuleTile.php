<?php
namespace App\Traqc\modules;

use App\Traqc\ModuleTile;

class SuiviVehiculeModuleTile extends ModuleTile{

    public function __construct()
    {
        parent::__construct();

        $this->title = "Suivi des Véhicules";
        $this->link = "https://traqc.processoft.com";
        $this->icon_type = "img";
        $this->icon = "traqctilelogo.png";
    }
}
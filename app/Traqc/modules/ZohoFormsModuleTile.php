<?php
namespace App\Traqc\modules;

use App\Traqc\ModuleTile;

class ZohoFormsModuleTile extends ModuleTile{

    public function __construct()
    {
        parent::__construct();

        $this->title = "Zoho Forms";
        $this->icon_type = "img";
        $this->link = "https://www.zoho.com/forms/";
        $this->icon = "zohoformslogo.png";
    }
}
<?php
namespace App\Traqc\modules;

use App\Traqc\ModuleTile;

class ZohoCrmModuleTile extends ModuleTile{

    public function __construct()
    {
        parent::__construct();

        $this->title = "Zoho CRM";
        $this->icon_type = "img";
        $this->link = "https://www.zoho.com/crm/";
        $this->icon = "zohocrmlogo.png";
    }
}
<?php
namespace App\Traqc\modules;

use App\Traqc\ModuleTile;

class QuickBooksOnlineModuleTile extends ModuleTile{

    public function __construct()
    {
        parent::__construct();
        $this->title = "Quick Books Online";
        $this->icon_type = "img";
        $this->link = "https://qbo.intuit.com/qbo35/login?webredir";
        $this->icon = "quickbooksonlinelogo.png";
    }
}
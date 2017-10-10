<?php

namespace App\Traqc\modules;
use App\Traqc\ModuleTile;

class FleetMapperModuleTile extends ModuleTile{

    public function __construct()
    {
        parent::__construct();

        $this->title = "Fleetmapper";
        $this->icon_type = "img";
        $this->link = "http://www.fleet-mapper.com/";
        $this->icon = "fleetmapperlogo.png";
    }
}
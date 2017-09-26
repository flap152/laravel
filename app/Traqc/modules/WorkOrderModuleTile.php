<?php
/**
 * Created by PhpStorm.
 * User: Loriane
 * Date: 2017-09-11
 * Time: 15:51
 */

namespace App\Traqc\modules;

use App\Traqc\ModuleTile;

class WorkOrderModuleTile extends ModuleTile
{
    public function __construct()
    {
        parent::__construct();

        $this->title = 'Bon de travail';
        $this->icon = 'fa fa-list-alt';
        $this->link = '/workorder-projet';
        $this->description = 'À venir';
    }
}
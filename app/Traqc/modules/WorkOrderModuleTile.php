<?php
/**
 * Created by PhpStorm.
 * User: Loriane
 * Date: 2017-09-11
 * Time: 15:51
 */

namespace App\Traqc\modules;

use App\Traqc\ModuleTile;

/**
 * Class WorkOrderModuleTile
 * @package App\Traqc\modules
 */
class WorkOrderModuleTile extends ModuleTile
{
    /**
     * WorkOrderModuleTile constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $this->title = 'Bon de travail';
        $this->icon = 'fa fa-list-alt';
        $this->icon_type = "fa";
        $this->link = '/workorder';
    }
}
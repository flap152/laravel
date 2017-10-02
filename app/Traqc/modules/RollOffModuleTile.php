<?php
/**
 * Created by PhpStorm.
 * User: Loriane
 * Date: 2017-09-13
 * Time: 14:26
 */

namespace App\Traqc\modules;


use App\Traqc\ModuleTile;

class RollOffModuleTile extends ModuleTile
{
    /**
     * RollOffModuleTile constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->title = 'Prise de commande roll-off';
        $this->icon = 'fa fa-list-alt';
        $this->description = 'À venir';
        $this->link = 'http://pro-jet.processoft.com';
    }
}
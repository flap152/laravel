<?php
/**
 * Created by PhpStorm.
 * User: Loriane
 * Date: 2017-09-13
 * Time: 14:23
 */

namespace App\Traqc\modules;


use App\Traqc\ModuleTile;

class TimeSheetModuleTile extends ModuleTile
{
    public function __construct()
    {
        $this->title = 'Feuille de temps';
        $this->description = "À venir";
        parent::__construct();
    }
}
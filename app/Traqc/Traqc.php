<?php
namespace App\Traqc;
use App\Traqc\modules\BiblioModuleTile;
use App\Traqc\modules\RollOffModuleTile;
use App\Traqc\modules\TimeSheetModuleTile;
use App\Traqc\modules\WorkOrderModuleTile;

class Traqc
{
    //TODO: implémentation de la classe

    /**
     * Obtenir chaque classe de module avec ses informations
     * @var $module1 BiblioModuleTile
     * @var $module2 RollOffModuleTile
     * @var $module3 TimeSheetModuleTile
     * @var $module4 WorkOrderModuleTile
     * @var $modules array
     * @return array
     */
    static function modules(){

        $module1 = new BiblioModuleTile;
        $module2 = new RollOffModuleTile;
        $module3 = new TimeSheetModuleTile;
        $module4 = new WorkOrderModuleTile;

        $modules = array($module1, $module2, $module3, $module4);

        return $modules;
    }
}
<?php
namespace App\Traqc;
use App\Traqc\modules\BiblioModuleTile;
use App\Traqc\modules\FleetMapperModuleTile;
use App\Traqc\modules\QuickBooksOnlineModuleTile;
use App\Traqc\modules\RollOffModuleTile;
use App\Traqc\modules\SuiviVehiculeModuleTile;
use App\Traqc\modules\TimeSheetModuleTile;
use App\Traqc\modules\WorkOrderModuleTile;
use App\Traqc\modules\ZohoCrmModuleTile;
use App\Traqc\modules\ZohoFormsModuleTile;

class Traqc
{
    //TODO: implémentation de la classe

    /**
     * Obtenir chaque classe de module avec ses informations
     * @var $modules array
     * @return array
     */
    static function modules(){

        $module1 = new BiblioModuleTile;
        $module2 = new RollOffModuleTile;
        $module3 = new WorkOrderModuleTile;
        $module4 = new TimeSheetModuleTile;
        $module5 = new FleetMapperModuleTile;
        $module6 = new ZohoFormsModuleTile;
        $module7 = new ZohoCrmModuleTile;
        $module8 = new SuiviVehiculeModuleTile;
        $module9 = new QuickBooksOnlineModuleTile;

        $modules = array(
                        $module1,
                        $module2,
                        $module3,
                        $module4,
                        $module5,
                        $module6,
                        $module7,
                        $module8,
                        $module9
                    );

        return $modules;
    }
}
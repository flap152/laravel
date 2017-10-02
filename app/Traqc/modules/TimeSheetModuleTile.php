<?php
/**
 * Created by PhpStorm.
 * User: Loriane
 * Date: 2017-09-13
 * Time: 14:23
 */

namespace App\Traqc\modules;


use App\Traqc\ModuleTile;

/**
 * Class TimeSheetModuleTile
 * @package App\Traqc\modules
 */
class TimeSheetModuleTile extends ModuleTile
{
    /**
     * TimeSheetModuleTile constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->title = 'Feuille de temps';
        $this->icon = 'fa fa-tasks';
        $this->link = '/timesheet';
        $this->description = "À venir";
    }
}
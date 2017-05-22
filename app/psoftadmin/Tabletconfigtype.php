<?php

namespace App\psoftadmin;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $No
 * @property string $ConfigTypeName
 * @property string $WinProductName
 * @property string $BIOS_VER
 * @property string $EC_VER
 * @property string $WinmateImageName
 * @property string $ProcessoftImageName
 * @property string $UpdateScript1
 */
class Tabletconfigtype extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['ConfigTypeName', 'WinProductName', 'BIOS_VER', 'EC_VER', 'WinmateImageName', 'ProcessoftImageName', 'UpdateScript1'];

    /**
     * The connection name for the model.
     * 
     * @var string
     */
    protected $connection = 'psoftadmin1';

}

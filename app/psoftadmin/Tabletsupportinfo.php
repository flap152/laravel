<?php

namespace App\psoftadmin;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $No
 * @property integer $DeviceID
 * @property integer $TabletConfigTypeID
 * @property string $LastSeen
 * @property string $DiskImageFlashed
 * @property string $DiskImageFlashDate
 * @property boolean $WriteCacheDisabled
 * @property string $ComputerName
 * @property string $Log
 * @property string $MAC
 * @property string $WriteCache
 * @property string $BIOS
 * @property string $EC
 * @property boolean $ConnJobDone
 * @property string $ConnJobDate
 * @property string $ConnJobComment
 */
class Tabletsupportinfo extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'tabletsupportinfo';

    /**
     * @var array
     */
    protected $fillable = ['DeviceID', 'TabletConfigTypeID', 'LastSeen', 'DiskImageFlashed', 'DiskImageFlashDate', 'WriteCacheDisabled', 'ComputerName', 'Log', 'MAC', 'WriteCache', 'BIOS', 'EC', 'ConnJobDone', 'ConnJobDate', 'ConnJobComment'];

    /**
     * The connection name for the model.
     * 
     * @var string
     */
    protected $connection = 'psoftadmin1';

}

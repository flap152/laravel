<?php

namespace App\psoftadmin;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $No
 * @property integer $TabID
 * @property boolean $IsConnectorDone
 * @property string $ConnJobDate
 */
class Tabletconnjob extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'tabletconnjob';

    /**
     * @var array
     */
    protected $fillable = ['TabID', 'IsConnectorDone', 'ConnJobDate'];

    /**
     * The connection name for the model.
     * 
     * @var string
     */
    protected $connection = 'psoftadmin1';

}

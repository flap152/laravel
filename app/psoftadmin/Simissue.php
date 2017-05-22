<?php

namespace App\psoftadmin;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $ID
 * @property string $Sim
 * @property string $Status
 * @property string $DateOpen
 * @property string $DateClose
 * @property string $TelcoTicket
 * @property string $CustTicket
 * @property string $ProcesSoftTicket
 * @property string $Comment
 * @property string $Memo
 */
class Simissue extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['Sim', 'Status', 'DateOpen', 'DateClose', 'TelcoTicket', 'CustTicket', 'ProcesSoftTicket', 'Comment', 'Memo'];

    /**
     * The connection name for the model.
     * 
     * @var string
     */
    protected $connection = 'psoftadmin1';

}

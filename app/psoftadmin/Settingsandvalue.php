<?php

namespace App\psoftadmin;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $No
 * @property string $CurrentBillDate
 */
class Settingsandvalue extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['CurrentBillDate'];

    /**
     * The connection name for the model.
     * 
     * @var string
     */
    protected $connection = 'psoftadmin1';

}

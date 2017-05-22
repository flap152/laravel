<?php

namespace App\psoftadmin;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $ID
 * @property string $VehicleName
 * @property integer $Customer
 * @property integer $GPSDevice
 * @property integer $TabletDevice
 * @property Customer $customer
 */
class Vehicle extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['VehicleName', 'Customer', 'GPSDevice', 'TabletDevice'];

    /**
     * The connection name for the model.
     * 
     * @var string
     */
    protected $connection = 'psoftadmin1';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer()
    {
        return $this->belongsTo('App\psoftadmin\Customer', 'Customer', 'ID');
    }
}

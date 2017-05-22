<?php

namespace App\psoftadmin;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $customerid
 * @property integer $ID
 * @property string $BillingName
 * @property string $TagPrefix
 * @property integer $TagNumber
 * @property string $SimNo
 * @property string $Telco
 * @property string $Phone
 * @property boolean $isActive
 * @property string $DateActive
 * @property boolean $isBillable
 * @property string $Comment
 * @property integer $Quotas
 * @property Customer $customer
 * @property Quota $quota
 * @property Telco $telco
 * @property Device[] $devices
 */
class Sim extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['customer', 'BillingName', 'TagPrefix', 'TagNumber', 'SimNo', 'Telco', 'Phone', 'isActive', 'DateActive', 'isBillable', 'Comment', 'Quotas'];

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
        return $this->belongsTo('App\psoftadmin\Customer', 'customer', 'ID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function quota()
    {
        return $this->belongsTo('App\psoftadmin\Quota', 'Quotas', 'ID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function telco()
    {
        return $this->belongsTo('App\psoftadmin\Telco', 'Telco', 'ID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function devices()
    {
        return $this->hasMany('App\psoftadmin\Device', 'Sim', 'ID');
    }
}

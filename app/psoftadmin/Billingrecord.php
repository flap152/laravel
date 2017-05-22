<?php

namespace App\psoftadmin;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $No
 * @property string $FactDate
 * @property string $FactNo
 * @property integer $Customer
 * @property string $DevTypeName
 * @property integer $Produit
 * @property integer $DeviceCount
 * @property Customer $customer
 * @property Produit $produit
 */
class Billingrecord extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['FactDate', 'FactNo', 'Customer', 'DevTypeName', 'Produit', 'DeviceCount'];

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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function produit()
    {
        return $this->belongsTo('App\psoftadmin\Produit', 'Produit', 'ID');
    }
}

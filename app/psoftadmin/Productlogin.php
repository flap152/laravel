<?php

namespace App\psoftadmin;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $No
 * @property integer $Customer
 * @property integer $Produit
 * @property string $Login
 * @property string $Pass
 * @property string $Commentaire
 * @property string $FeederID
 * @property integer $ParkingGPS
 * @property integer $GPS
 * @property integer $Tablets
 * @property integer $UnusedGPS
 * @property integer $UnusedTablets
 * @property string $VehList
 * @property string $TabList
 * @property string $GpsList
 * @property string $LastVerif
 * @property Customer $customer
 * @property Produit $produit
 */
class Productlogin extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['Customer', 'Produit', 'Login', 'Pass', 'Commentaire', 'FeederID', 'ParkingGPS', 'GPS', 'Tablets', 'UnusedGPS', 'UnusedTablets', 'VehList', 'TabList', 'GpsList', 'LastVerif'];

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

<?php

namespace App\psoftadmin;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $ID
 * @property integer $Model
 * @property string $Serial
 * @property integer $Sim
 * @property integer $Customer
 * @property boolean $isBillable
 * @property boolean $isSuspended
 * @property string $Activation
 * @property integer $Produit
 * @property string $Notes
 * @property string $ConfigTemp
 * @property string $IMEI
 * @property Customer $customer
 * @property Devicemodel $devicemodel
 * @property Produit $produit
 * @property Sim $sim
 */
class Device extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['Model', 'Serial', 'Sim', 'Customer', 'isBillable', 'isSuspended', 'Activation', 'Produit', 'Notes', 'ConfigTemp', 'IMEI'];

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
    public function devicemodel()
    {
        return $this->belongsTo('App\psoftadmin\Devicemodel', 'Model', 'ID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function produit()
    {
        return $this->belongsTo('App\psoftadmin\Produit', 'Produit', 'ID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sim()
    {
        return $this->belongsTo('App\psoftadmin\Sim', 'Sim', 'ID');
    }
}

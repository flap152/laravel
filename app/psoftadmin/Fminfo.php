<?php

namespace App\psoftadmin;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $No
 * @property integer $Customers
 * @property integer $Produit
 * @property string $AdminLogin
 * @property string $AdminPwd
 * @property Customer $customer
 * @property Produit $produit
 */
class Fminfo extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'fminfo';

    /**
     * @var array
     */
    protected $fillable = ['Customers', 'Produit', 'AdminLogin', 'AdminPwd'];

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
        return $this->belongsTo('App\psoftadmin\Customer', 'Customers', 'ID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function produit()
    {
        return $this->belongsTo('App\psoftadmin\Produit', 'Produit', 'ID');
    }
}

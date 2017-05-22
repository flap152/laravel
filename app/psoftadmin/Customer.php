<?php

namespace App\psoftadmin;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $ID
 * @property string $CustName
 * @property string $BillToEmail
 * @property Billingrecord[] $billingrecords
 * @property Changement[] $changements
 * @property Device[] $devices
 * @property Fminfo[] $fminfos
 * @property Productlogin[] $productlogins
 * @property Sim[] $sims
 * @property Vehicle[] $vehicles
 */
class Customer extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['CustName', 'BillToEmail'];

    /**
     * The connection name for the model.
     * 
     * @var string
     */
    protected $connection = 'psoftadmin1';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function billingrecords()
    {
        return $this->hasMany('App\psoftadmin\Billingrecord', 'Customer', 'ID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function changements()
    {
        return $this->hasMany('App\psoftadmin\Changement', 'Customer', 'ID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function devices()
    {
        return $this->hasMany('App\psoftadmin\Device', 'Customer', 'ID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function fminfos()
    {
        return $this->hasMany('App\psoftadmin\Fminfo', 'Customers', 'ID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productlogins()
    {
        return $this->hasMany('App\psoftadmin\Productlogin', 'Customer', 'ID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sims()
    {
        return $this->hasMany('App\psoftadmin\Sim', 'customer', 'ID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function vehicles()
    {
        return $this->hasMany('App\psoftadmin\Vehicle', 'Customer', 'ID');
    }
}

<?php

namespace App\psoftadmin;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $ID
 * @property string $Nom
 * @property integer $SortOrderX
 * @property integer $DevCategory
 * @property Devicecategory $devicecategory
 * @property Billingrecord[] $billingrecords
 * @property Changement[] $changements
 * @property Device[] $devices
 * @property Fminfo[] $fminfos
 * @property Productlogin[] $productlogins
 */
class Produit extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['Nom', 'SortOrderX', 'DevCategory'];

    /**
     * The connection name for the model.
     * 
     * @var string
     */
    protected $connection = 'psoftadmin1';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function devicecategory()
    {
        return $this->belongsTo('App\psoftadmin\Devicecategory', 'DevCategory', 'ID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function billingrecords()
    {
        return $this->hasMany('App\psoftadmin\Billingrecord', 'Produit', 'ID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function changements()
    {
        return $this->hasMany('App\psoftadmin\Changement', 'produitOrigine', 'ID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function devices()
    {
        return $this->hasMany('App\psoftadmin\Device', 'Produit', 'ID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function fminfos()
    {
        return $this->hasMany('App\psoftadmin\Fminfo', 'Produit', 'ID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productlogins()
    {
        return $this->hasMany('App\psoftadmin\Productlogin', 'Produit', 'ID');
    }
}

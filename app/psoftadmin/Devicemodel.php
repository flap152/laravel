<?php

namespace App\psoftadmin;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $ID
 * @property string $DevTypeName
 * @property integer $Dev Category
 * @property string $DevLongName
 * @property integer $Vendor
 * @property string $Comment
 * @property string $VendorPartNo
 * @property integer $SortOrder
 * @property Devicecategory $devicecategory
 * @property Devicevendor $devicevendor
 * @property Device[] $devices
 */
class Devicemodel extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['DevTypeName', 'Dev Category', 'DevLongName', 'Vendor', 'Comment', 'VendorPartNo', 'SortOrder'];

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
        return $this->belongsTo('App\psoftadmin\Devicecategory', 'Dev Category', 'ID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function devicevendor()
    {
        return $this->belongsTo('App\psoftadmin\Devicevendor', 'Vendor', 'ID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function devices()
    {
        return $this->hasMany('App\psoftadmin\Device', 'Model', 'ID');
    }
}

<?php

namespace App\psoftadmin;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $ID
 * @property string $DevVendorName
 * @property Devicemodel[] $devicemodels
 */
class Devicevendor extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'devicevendor';

    /**
     * @var array
     */
    protected $fillable = ['DevVendorName'];

    /**
     * The connection name for the model.
     * 
     * @var string
     */
    protected $connection = 'psoftadmin1';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function devicemodels()
    {
        return $this->hasMany('App\psoftadmin\Devicemodel', 'Vendor', 'ID');
    }
}

<?php

namespace App\psoftadmin;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $No
 * @property string $Telco
 * @property Telco $telco
 */
class Comptestelco extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['Telco'];

    /**
     * The connection name for the model.
     * 
     * @var string
     */
    protected $connection = 'psoftadmin1';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function telco()
    {
        return $this->belongsTo('App\psoftadmin\Telco', 'Telco', 'ID');
    }
}

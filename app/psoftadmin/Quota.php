<?php

namespace App\psoftadmin;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $ID
 * @property string $NomQuota
 * @property float $PrixAttendu
 * @property integer $DonneesAttendues
 * @property string $NomBell
 * @property string $Description
 * @property boolean $Partage
 * @property Sim[] $sims
 */
class Quota extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['NomQuota', 'PrixAttendu', 'DonneesAttendues', 'NomBell', 'Description', 'Partage'];

    /**
     * The connection name for the model.
     * 
     * @var string
     */
    protected $connection = 'psoftadmin1';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sims()
    {
        return $this->hasMany('App\psoftadmin\Sim', 'Quotas', 'ID');
    }
}

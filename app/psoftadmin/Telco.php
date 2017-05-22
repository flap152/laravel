<?php

namespace App\psoftadmin;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $ID
 * @property string $NoCompte
 * @property string $CourrielCommande
 * @property string $CourrielSupport
 * @property Comptestelco[] $comptestelcos
 * @property Sim[] $sims
 */
class Telco extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['NoCompte', 'CourrielCommande', 'CourrielSupport'];

    /**
     * The connection name for the model.
     * 
     * @var string
     */
    protected $connection = 'psoftadmin1';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comptestelcos()
    {
        return $this->hasMany('App\psoftadmin\Comptestelco', 'Telco', 'ID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sims()
    {
        return $this->hasMany('App\psoftadmin\Sim', 'Telco', 'ID');
    }
}

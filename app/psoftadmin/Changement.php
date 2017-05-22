<?php

namespace App\psoftadmin;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $No
 * @property integer $TypeChangement
 * @property string $DateChangement
 * @property boolean $Billable
 * @property string $deviceID
 * @property integer $Customer
 * @property integer $produitOrigine
 * @property integer $produitDestination
 * @property string $ticket
 * @property string $commentaire
 * @property Customer $customer
 * @property Produit $produit
 */
class Changement extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['TypeChangement', 'DateChangement', 'Billable', 'deviceID', 'Customer', 'produitOrigine', 'produitDestination', 'ticket', 'commentaire'];

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
        return $this->belongsTo('App\psoftadmin\Produit', 'produitOrigine', 'ID');
    }
}

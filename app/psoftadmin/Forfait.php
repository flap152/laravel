<?php

namespace App\psoftadmin;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $ID
 * @property string $NomForfait
 * @property float $PrixMensuel
 * @property integer $DonneesIncluses
 * @property string $NomBell
 * @property string $Description
 */
class Forfait extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['NomForfait', 'PrixMensuel', 'DonneesIncluses', 'NomBell', 'Description'];

    /**
     * The connection name for the model.
     * 
     * @var string
     */
    protected $connection = 'psoftadmin1';

}

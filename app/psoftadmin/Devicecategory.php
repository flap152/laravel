<?php

namespace App\psoftadmin;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $ID
 * @property string $DevCatName
 * @property integer $SortOrder
 * @property Devicemodel[] $devicemodels
 * @property Produit[] $produits
 */
class Devicecategory extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['DevCatName', 'SortOrder'];

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
        return $this->hasMany('App\psoftadmin\Devicemodel', 'Dev Category', 'ID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function produits()
    {
        return $this->hasMany('App\psoftadmin\Produit', 'DevCategory', 'ID');
    }
}

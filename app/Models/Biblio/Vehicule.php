<?php
namespace App\Models\Biblio;

use Illuminate\Database\Eloquent\Model;
use App\Models\Biblio\Document;

class Vehicule extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    public function documents(){

        return $this->hasMany('App\Models\Biblio\Document');
    }
    /**
     * @param array $attributes
     */
}
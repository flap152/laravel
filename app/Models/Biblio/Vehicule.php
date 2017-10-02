<?php
namespace App\Models\Biblio;

use Illuminate\Database\Eloquent\Model;

class Vehicule extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function documents(){

        return $this->hasMany(Document::class);
    }
}
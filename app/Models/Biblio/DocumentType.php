<?php
/**
 * Created by PhpStorm.
 * User: Loriane
 * Date: 2017-07-27
 * Time: 15:02
 */

namespace App\Models\Biblio;


use Illuminate\Database\Eloquent\Model;


class DocumentType extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title'];

    public function documents()
    {
        return $this->hasMany(Document::class);
    }
}
<?php
namespace App\Models\Biblio;

use Illuminate\Database\Eloquent\Model;
use App\Models\Biblio\Vehicule;

class Document extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table;



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'document_date', 'link'];

    public function Vehicule(){

        return $this->belongsTo('App\Models\Biblio\Vehicule');
    }

    public function DocumentType(){

        return $this->hasOne('DocumentType');
    }

    public function getURL(){
        return "/flap3/" . $this->id;
    }

}

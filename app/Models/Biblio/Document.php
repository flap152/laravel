<?php
namespace App\Models\Biblio;

use Illuminate\Database\Eloquent\Model;
use App\Models\Biblio\Vehicule;
use App\Models\Biblio\DocumentType;

class Document extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    //protected $table;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function vehicule(){

        return $this->belongsTo(Vehicule::class);
    }

    public function document_type(){

        return $this->belongsTo(DocumentType::class);
    }

    public function getURL(){
        return "/pj/" . $this->id;
    }

}

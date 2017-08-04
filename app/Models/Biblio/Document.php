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
    //protected $fillable = ['title', 'document_date', 'link','document_type_id'];
    protected $guarded = [];

    public function vehicule(){

        return $this->belongsTo('App\Models\Biblio\Vehicule','vehicule_id');
    }

    public function document_type(){

        return $this->belongsTo('App\Models\Biblio\DocumentType','document_type_id');
    }

    public function getURL(){
        return "/flap3/" . $this->link;
    }

}

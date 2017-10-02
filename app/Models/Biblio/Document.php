<?php
namespace App\Models\Biblio;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function vehicule(){

        return $this->belongsTo(Vehicule::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function document_type(){

        return $this->belongsTo(DocumentType::class);
    }


    /**
     * @return string
     */
    public function getURL(){
        return "/pj/" . $this->id;
    }

    public function getDocDayAttribute($value){

        return Carbon::createFromTimestamp($value)->format('D');
    }
}

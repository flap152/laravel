<?php
/**
 * Created by PhpStorm.
 * User: Loriane
 * Date: 2017-09-08
 * Time: 13:37
 */

namespace App\Traqc\modules;
use App\Models\Biblio\Vehicule;
use App\Models\Biblio\Document;
use App\Traqc\ModuleTile;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

/**
 * Class BiblioModuleTile
 * @package App\Traqc\modules
 */
class BiblioModuleTile extends ModuleTile
{
    /**
     * BiblioModuleTile constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $this->title = trans('strings.biblio.documents.list_title');
        $this->icon = 'fa fa-file-pdf-o';
        $this->icon_type = "fa";
        $this->link = '/vehicules';
        $this->description = $this->getLatest5Documents();
    }

    /**
     * Obtient les derniers documents de 5 véhicules
     * @var Collection $vehicules
     * @return Collection|static[]
     */
    public function getLatest5Documents(){

        $vehicules = Vehicule::with('documents')
            ->select('vehicules.id','vehicules.name', DB::raw('max(document_date) as document_date'))
            ->join('documents', 'vehicules.id', '=', 'documents.vehicule_id')
            ->groupBy('vehicules.id')
            ->orderByDesc('document_date')
            ->limit(5)
            ->get();

        $documents = Vehicule::with('documents')->whereIn('id', $vehicules->pluck('id'))->orderBy('name')->get();

        return $documents;
    }

    /**
     * Obtient les documents des 7 derniers jours
     * @var Collection $documents
     * @var array $data
     * @return array
     */
    static function getLatest7DaysDocuments(){

        //Date à comparer
        $today = date('Y-m-d 23:00:00');
        $daysInterval = date('Y-m-d 00:00:00', strtotime('-6 days'));

        $documents = Document::select(DB::raw('DATE(document_date) as document_date'), DB::raw('COUNT(id) as doc_count'))
            ->whereBetween(DB::raw('DATE(document_date)'), array($daysInterval,$today))
            ->groupBy(DB::raw('DATE(document_date)'))
            ->orderBy(DB::raw('DATE(document_date)'))
            ->get();

        $data = array();

        /*Obtenir les journées automatiquement.
          À partir de la journée courante, ajoute le nombre que contient $i
          Retourne le nom de la journée de la semaine
        */

        for($i = 6; $i >= 0; $i--){

            $day = Carbon::today()->subDay($i)->format('D d');

            $data[$day] = 0;
        }

        /*
         * Pour chaque document, récupère la journée de la semaine
         * Vérifie si la date est présente dans le tableau $data
         * Si présent, ajoute le nombre récupéré sinon 0
         */
        foreach($documents as $doc){

            $date = date('D d', strtotime($doc->document_date));

            if(in_array($date, $data)){

                $data[$date] = $doc->doc_count;
            }
        }

        return $data;
    }
}
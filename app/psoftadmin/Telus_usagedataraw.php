<?php

namespace App\psoftadmin;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $ID
 * @property string $Sous-niveau
 * @property string $Champ2
 * @property string $Référence_1
 * @property string $Référence_2
 * @property string $Type de Produit
 * @property string $Numéro d'appareil
 * @property string $Nom pour la facturation
 * @property string $Nom_pour la facturation - ligne supplémentaire
 * @property string $Nom_du forfait
 * @property float $Prix du forfait
 * @property float $Temps d'antenne local additionnel
 * @property string $Min non-util/Min add
 * @property float $Services contribuant à la fusion de temps d'antenne
 * @property float $Ensemble des services
 * @property float $Aucune fus de  temps d'ant sur ces forf
 * @property float $Interurbains
 * @property float $Itinérance
 * @property float $Services_de transmission de données Encore plus
 * @property float $Services_d'appels vocaux Encore plus
 * @property float $Services_de_téléavertisseur
 * @property float $Services_à valeur ajoutée
 * @property float $Autres frais et crédits
 * @property float $Autres_frais
 * @property float $TVP TVQ TVH
 * @property float $Sous_total avant TPS
 * @property float $TPS
 * @property float $Total
 */
class Telus_usagedataraw extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'telus_usagedataraw';

    /**
     * @var array
     */
    protected $fillable = ['ID', 'Sous-niveau', 'Champ2', 'Référence 1', 'Référence 2', 'Type de Produit', 'Numéro d\'appareil', 'Nom pour la facturation', 'Nom pour la facturation - ligne supplémentaire', 'Nom du forfait', 'Prix du forfait', 'Temps d\'antenne local additionnel', 'Min non-util/Min add', 'Services contribuant à la fusion de temps d\'antenne', 'Ensemble des services', 'Aucune fus de  temps d\'ant sur ces forf', 'Interurbains', 'Itinérance', 'Services de transmission de données Encore plus', 'Services d\'appels vocaux Encore plus', 'Services de téléavertisseur', 'Services à valeur ajoutée', 'Autres frais et crédits', 'Autres frais', 'TVP TVQ TVH', 'Sous-total avant TPS', 'TPS', 'Total'];

    /**
     * The connection name for the model.
     * 
     * @var string
     */
    protected $connection = 'psoftadmin1';

}

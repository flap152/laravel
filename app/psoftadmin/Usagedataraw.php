<?php

namespace App\psoftadmin;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $ID
 * @property integer $Num compte
 * @property string $Date fact
 * @property string $Num_tel_mo
 * @property string $Nom
 * @property string $Prenom
 * @property string $Num_refer
 * @property string $Abonne de groupe
 * @property string $Categorie
 * @property string $Sous-categorie
 * @property float $Total-redr
 * @property float $Tot fr mens
 * @property float $Fr option
 * @property string $Durtemps
 * @property float $Fr_temps
 * @property float $Fr_donnees
 * @property float $Fr_itiner
 * @property float $Fr_int itin
 * @property float $Fr_d'inter
 * @property float $Autres fr
 * @property float $Esc total
 * @property float $Tot_fr cour
 * @property integer $MessTxt
 * @property float $Tot_MessTxt
 * @property string $Dur don
 * @property string $Durinter
 * @property string $Dur_itin
 * @property float $Intdndur
 * @property float $Fraisintdon
 * @property float $Vol TP
 * @property float $Utilis TP
 * @property float $TPS
 * @property float $TVH
 * @property integer $TVH_iPe Tel
 * @property float $TVHO Tel
 * @property float $TVHBC Tel
 * @property float $TVO
 * @property float $TVQ - telec
 * @property float $TVQ_autre
 * @property float $TVP - i-P-e
 * @property float $TVP_CB
 * @property float $TVP_Sask
 * @property float $TVP_Man
 * @property float $Tx autr pay
 * @property string $Du 10-4P
 * @property float $Frais 10-4P
 * @property string $Du_10_4G
 * @property float $Frais_10_4G
 * @property string $It 10-4
 * @property float $Fr_it 10-4
 * @property string $Min jour
 * @property string $Min_W/E
 * @property string $Min_soir
 * @property string $MinTrAnt
 * @property string $MinAdmTr
 * @property string $MinAdmUt
 * @property string $MinExpFct
 * @property string $TotMinTr
 * @property string $Min_a part
 * @property string $Min_part ut
 * @property float $Mo a part
 * @property float $Mo_part ut
 * @property integer $even a part
 * @property integer $ev part ut
 * @property integer $App_a_part
 * @property integer $App_part_ut
 */
class Usagedataraw extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'usagedataraw';

    /**
     * @var array
     */
    protected $fillable = ['Num compte', 'Date fact', 'Num tel mo', 'Nom', 'Prenom', 'Num refer', 'Abonne de groupe', 'Categorie', 'Sous-categorie', 'Total-redr', 'Tot fr mens', 'Fr option', 'Durtemps', 'Fr temps', 'Fr donnees', 'Fr itiner', 'Fr int itin', 'Fr d\'inter', 'Autres fr', 'Esc total', 'Tot fr cour', 'MessTxt', 'Tot MessTxt', 'Dur don', 'Durinter', 'Dur itin', 'Intdndur', 'Fraisintdon', 'Vol TP', 'Utilis TP', 'TPS', 'TVH', 'TVH iPe Tel', 'TVHO Tel', 'TVHBC Tel', 'TVO', 'TVQ - telec', 'TVQ - autre', 'TVP - i-P-e', 'TVP CB', 'TVP - Sask', 'TVP - Man', 'Tx autr pay', 'Du 10-4P', 'Frais 10-4P', 'Du 10-4G', 'Frais 10-4G', 'It 10-4', 'Fr it 10-4', 'Min jour', 'Min W/E', 'Min soir', 'MinTrAnt', 'MinAdmTr', 'MinAdmUt', 'MinExpFct', 'TotMinTr', 'Min a part', 'Min part ut', 'Mo a part', 'Mo part ut', 'even a part', 'ev part ut', 'App a part', 'App part ut'];

    /**
     * The connection name for the model.
     * 
     * @var string
     */
    protected $connection = 'psoftadmin1';

}

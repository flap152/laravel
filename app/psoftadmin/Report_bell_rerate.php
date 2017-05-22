<?php

namespace App\psoftadmin;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $ID
 * @property string $Invoice
 * @property string $Mobile
 * @property float $Ent Seq No
 * @property string $Type
 * @property string $Description
 * @property float $Old Rate
 * @property float $New Rate
 * @property float $Credit
 */
class Report_bell_rerate extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'report_bell_rerate';

    /**
     * @var array
     */
    protected $fillable = ['ID', 'Invoice', 'Mobile', 'Ent Seq No', 'Type', 'Description', 'Old Rate', 'New Rate', 'Credit'];

    /**
     * The connection name for the model.
     * 
     * @var string
     */
    protected $connection = 'psoftadmin1';

}

<?php

namespace App\psoftadmin;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $ID
 * @property string $Memo1
 */
class Tblutil extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'tblutil';

    /**
     * @var array
     */
    protected $fillable = ['Memo1'];

    /**
     * The connection name for the model.
     * 
     * @var string
     */
    protected $connection = 'psoftadmin1';

}

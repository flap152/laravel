<?php

namespace App\psoftadmin;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $Phone
 * @property string $Plan
 * @property string $comment
 */
class Phoneplan extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'phoneplan';

    /**
     * @var array
     */
    protected $fillable = ['Phone', 'Plan', 'comment'];

    /**
     * The connection name for the model.
     * 
     * @var string
     */
    protected $connection = 'psoftadmin1';

}

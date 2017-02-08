<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //
        /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'companies';

    protected $fillable = [
    	'name',
    	'email',
    	'phone'
    ];

/**
 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
 */
public function user()
{
	return $this->belongsTo('App\User');
}




}

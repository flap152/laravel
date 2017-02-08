<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    //protected $table = 'contacts'; // not needed when default name

    protected $fillable = [
        'first_name',
        'last_namelast_name',
        'title',
        'department',
        'email',
        'status'
    ];
}



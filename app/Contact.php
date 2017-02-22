<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Contact
 *
 * @property int $id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $first_name
 * @property string $last_name
 * @property string $title
 * @property string $department
 * @property string $email
 * @property string $status
 * @method static \Illuminate\Database\Query\Builder|\App\Contact whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Contact whereDepartment($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Contact whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Contact whereFirstName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Contact whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Contact whereLastName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Contact whereStatus($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Contact whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Contact whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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



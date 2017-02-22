<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Company
 *
 * @property int $id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $name
 * @property string $phone
 * @property string $email
 * @property int $user_id
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Query\Builder|\App\Company whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Company whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Company whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Company whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Company wherePhone($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Company whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Company whereUserId($value)
 * @mixin \Eloquent
 */
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

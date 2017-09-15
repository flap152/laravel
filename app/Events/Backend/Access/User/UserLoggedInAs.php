<?php

namespace App\Events\Backend\Access\User;

use Illuminate\Foundation\Auth\User;
use Illuminate\Queue\SerializesModels;

/**
 * Class UserLoggedIn.
 */
class UserLoggedInAs
{
    use SerializesModels;

    /**
     * @var User
     */
    public $user;

    /**
     * @var string
     */
    public $impersonator;

    /**
     * @param User $user
     *
     * @param string $impersonator
     *   name of the impersonator
     */
    public function __construct( $user, $impersonator = 'unknown')
    {
        $this->user = $user;
        $this->impersonator = $impersonator;
    }
}

<?php

namespace App\Http\Controllers\Backend\Auth\User;

use App\Models\Auth\User;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\Auth\UserRepository;
use App\Notifications\Frontend\Auth\UserNeedsConfirmation;
use App\Http\Requests\Backend\Auth\User\BarelyManageUserRequest;

/**
 * Class UserConfirmationController.
 */
class UserConfirmationController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $users;

    /**
     * @param UserRepository $users
     */
    public function __construct(UserRepository $users)
    {
        $this->users = $users;
    }

    /**
     * @param User              $user
     * @param BarelyManageUserRequest $request
     *
     * @return mixed
     */
    public function sendConfirmationEmail(User $user, BarelyManageUserRequest $request)
    {
        // Shouldn't allow users to confirm their own accounts when the application is set to manual confirmation
        if (config('access.users.requires_approval')) {
            return redirect()->back()->withFlashDanger(trans('alerts.backend.users.cant_resend_confirmation'));
        }

        $user->notify(new UserNeedsConfirmation($user->confirmation_code));

        return redirect()->back()->withFlashSuccess(trans('alerts.backend.users.confirmation_email'));
    }

    /**
     * @param User              $user
     * @param BarelyManageUserRequest $request
     *
     * @return mixed
     */
    public function confirm(User $user, BarelyManageUserRequest $request)
    {
        $this->users->confirm($user);

        return redirect()->route('admin.auth.user.index')->withFlashSuccess(trans('alerts.backend.users.confirmed'));
    }

    /**
     * @param User              $user
     * @param BarelyManageUserRequest $request
     *
     * @return mixed
     */
    public function unconfirm(User $user, BarelyManageUserRequest $request)
    {
        $this->users->unconfirm($user);

        return redirect()->route('admin.auth.user.index')->withFlashSuccess(trans('alerts.backend.users.unconfirmed'));
    }
}

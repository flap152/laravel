<?php

namespace App\Http\Requests\Backend\Auth\User;

//use App\Http\Requests\Request;
use App\Models\Auth\User;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class BarelyManageUserRequest.
 * Will allow users with view-backend and confirm-users permissions. Should be used for user management actions except
 * create and delete.
 */
class BarelyManageUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        /** @var User $user */
        $user = $this->user();
        return $user->can('authorize users') and $user->can('view backend');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }
}

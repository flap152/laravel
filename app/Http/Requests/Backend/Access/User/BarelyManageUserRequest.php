<?php

namespace App\Http\Requests\Backend\Access\User;

use App\Http\Requests\Request;

/**
 * Class BarelyManageUserRequest.
 * Will allow uers with view-backend and confirm-users permissions. Should be used for user management actions except
 * create and delete.
 */
class BarelyManageUserRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return access()->hasPermissions(['confirm-users','view-backend'],true);
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

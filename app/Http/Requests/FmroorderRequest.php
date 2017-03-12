<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FmroorderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'OrderNumber'       => 'required|numeric',
            'ServiceAddressStreet'      => 'required',
            'SizeOfTheContainerToBeDelivered' => 'required|numeric',
            'DestinationAddressLat' => 'numeric',
            'DestinationAddressLng' => 'numeric',
        ];

        return $rules;
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Fmroorder;

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
            'CustomerName'=> 'required',
            'CustomerContactFirstName'=> 'required',
            'CustomerContactLastName'=> 'required',
            'CustomerContactPhoneNumber'=> 'required',

            'SizeOfTheContainerToBeDelivered' => 'required_if:OperationType,1,3,4,5 |numeric|min:1',
            'SizeOfTheContainerToBePickedUp' => 'required_if:OperationType,2,3,4,5 |numeric|min:1',
            'NameOfTheContainerToBePickedUp'=> 'required_if:OperationType,2,3,4,5',
            'OperationType'=> 'required',
            'RequestedFromTime'=> 'date|required|after:today',
            'RequestedToTime'=> 'date|required|after:RequestedFromTime',

        ];

        return $rules;
    }
}

/*       'OrderNumber',
        'VendorPoNumber',
        'CustomerPoNumber',
        'CustomerName',
        'CustomerBillingAddressStreet',
        'CustomerBillingAddressCity',
        'CustomerBillingAddressProvince',
        'CustomerBillingAddressPostalCode',
        'CustomerContactFirstName',
        'CustomerContactLastName',
        'CustomerContactPhoneNumber',
        'CustomerContactEmailAddress',
        'ServiceAddressStreet',
        'ServiceAddressCity',
        'ServiceAddressProvince',
        'ServiceAddressPostalCode',
        'ServiceAddressLat',
        'ServiceAddressLng',
        'OperationType',
        'SizeOfTheContainerToBeDelivered',
        'SizeOfTheContainerToBePickedUp',
        'NameOfTheContainerToBePickedUp',
        'TypeOfWaste',
        'RequestedFromTime',
        'RequestedToTime',
        'DriverNotes',
        'DestinationAddressStreet',
        'DestinationAddressCity',
        'DestinationAddressPostalCode',
        'DestinationAddressProvince',
        'DestinationAddressLat',
        'DestinationAddressLng',
        'Urgency',
        'AmountToCollect',
        'CompanyName',
        'EndCustomerId',
        'IsRecurrent'*/

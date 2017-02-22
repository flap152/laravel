<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use SoftDeletes;

/**
 * App\FMROOrder
 *
 * @property int $id
 * @property int $status
 * @property string $OrderNumber
 * @property string $VendorPoNumber
 * @property string $CustomerPoNumber
 * @property string $CustomerName
 * @property string $CustomerBillingAddressStreet
 * @property string $CustomerBillingAddressCity
 * @property string $CustomerBillingAddressProvince
 * @property string $CustomerBillingAddressPostalCode
 * @property string $CustomerContactFirstName
 * @property string $CustomerContactLastName
 * @property string $CustomerContactPhoneNumber
 * @property string $CustomerContactEmailAddress
 * @property string $ServiceAddressStreet
 * @property string $ServiceAddressCity
 * @property string $ServiceAddressProvince
 * @property string $ServiceAddressPostalCode
 * @property float $ServiceAddressLat
 * @property float $ServiceAddressLng
 * @property int $OperationType
 * @property string $SizeOfTheContainerToBeDelivered
 * @property string $SizeOfTheContainerToBePickedUp
 * @property string $NameOfTheContainerToBePickedUp
 * @property string $TypeOfWaste
 * @property string $RequestedFromTime
 * @property string $RequestedToTime
 * @property string $DriverNotes
 * @property string $DestinationAddressStreet
 * @property string $DestinationAddressCity
 * @property string $DestinationAddressPostalCode
 * @property string $DestinationAddressProvince
 * @property float $DestinationAddressLat
 * @property float $DestinationAddressLng
 * @property string $Urgency
 * @property float $AmountToCollect
 * @property string $CompanyName
 * @property string $EndCustomerId
 * @property string $IsRecurrent
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Fmroorder whereAmountToCollect($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Fmroorder whereCompanyName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Fmroorder whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Fmroorder whereCustomerBillingAddressCity($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Fmroorder whereCustomerBillingAddressPostalCode($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Fmroorder whereCustomerBillingAddressProvince($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Fmroorder whereCustomerBillingAddressStreet($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Fmroorder whereCustomerContactEmailAddress($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Fmroorder whereCustomerContactFirstName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Fmroorder whereCustomerContactLastName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Fmroorder whereCustomerContactPhoneNumber($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Fmroorder whereCustomerName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Fmroorder whereCustomerPoNumber($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Fmroorder whereDestinationAddressCity($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Fmroorder whereDestinationAddressLat($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Fmroorder whereDestinationAddressLng($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Fmroorder whereDestinationAddressPostalCode($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Fmroorder whereDestinationAddressProvince($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Fmroorder whereDestinationAddressStreet($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Fmroorder whereDriverNotes($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Fmroorder whereEndCustomerId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Fmroorder whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Fmroorder whereIsRecurrent($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Fmroorder whereNameOfTheContainerToBePickedUp($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Fmroorder whereOperationType($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Fmroorder whereOrderNumber($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Fmroorder whereRequestedFromTime($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Fmroorder whereRequestedToTime($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Fmroorder whereServiceAddressCity($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Fmroorder whereServiceAddressLat($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Fmroorder whereServiceAddressLng($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Fmroorder whereServiceAddressPostalCode($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Fmroorder whereServiceAddressProvince($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Fmroorder whereServiceAddressStreet($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Fmroorder whereSizeOfTheContainerToBeDelivered($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Fmroorder whereSizeOfTheContainerToBePickedUp($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Fmroorder whereStatus($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Fmroorder whereTypeOfWaste($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Fmroorder whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Fmroorder whereUrgency($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Fmroorder whereVendorPoNumber($value)
 * @mixin \Eloquent
 */
class Fmroorder extends \Eloquent
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'fmroorder';



    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['OrderNumber','VendorPoNumber','CustomerPoNumber','CustomerName',
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
        'IsRecurrent'];





}

/*
 *
 * $data='{"OrderNumber":"' . $uniqueID . '","VendorPoNumber":"' . $uniqueID . '","CustomerPoNumber":"' . $uniqueID .
    '","CustomerName":"Construction Processoft2",
    "CustomerBillingAddressStreet":null,
    "CustomerBillingAddressCity":null,
    "CustomerBillingAddressProvince":null,
    "CustomerBillingAddressPostalCode":null,
    "CustomerContactFirstName":"Rejean",
    "CustomerContactLastName":"Ayotte",
    "CustomerContactPhoneNumber":"514-317-9317",
    "CustomerContactEmailAddress":"rayotte@processoft.com",
    "ServiceAddressStreet":"' . rand(10,19999) .' boul Cousineau 180",
    "ServiceAddressCity":"St-Hubert",
    "ServiceAddressProvince":"Quebec",
    "ServiceAddressPostalCode":"J3Y0E1",
    "ServiceAddressLat":' . ((4550483 +rand(0,50000)-25000)/100000) . ',
    "ServiceAddressLng":-' . ((7342995 +rand(0,50000)-25000)/100000) . ',
    "OperationType":1,
    "SizeOfTheContainerToBeDelivered":12,
    "SizeOfTheContainerToBePickedUp":null,
    "NameOfTheContainerToBePickedUp":"",
    "TypeOfWaste":"Mix",
    "RequestedFromTime":"2017-02-' . $reqDay . ' 05:0:0",
    "RequestedToTime":"2017-02-' . $reqDay . ' 19:0:0",
    "DriverNotes":"drivernoessssss",
    "DestinationAddressStreet":null,
    "DestinationAddressCity":null,
    "DestinationAddressPostalCode":null,
    "DestinationAddressProvince":null,
    "DestinationAddressLat":null,
    "DestinationAddressLng":null,
    "Urgency":1,
    "AmountToCollect":"0",
    "CompanyName":null,
    "EndCustomerId":521,
    "IsRecurrent":0
}';
 *
 */

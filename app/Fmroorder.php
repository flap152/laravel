<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Fmroorderresult;


/**
 * Class Fmroorder
 * @package App
 */
class Fmroorder extends Model
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'fmroorder';

    public $timestamps = true;

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope('ordering', function(Builder $builder) {
            $builder->orderBy('created_at', 'desc');
        });
    }



    protected static $operationTypes = [
        '0' => 'Undefined',
        '1' => 'Delivery',
        '2' => 'Pickup',
        '3' => 'Exchange',
        '4' => 'EmptyAndReturn',
        '5' => 'Move',
    ];

    public static function getOperationTypes()
    {
        return self::$operationTypes;
    }

    public function operationTypeLabel()
    {
        return $this->getOperationTypes()[$this->OperationType ];
    }


    public function orderResult (){
        return $this->hasOne('App\Fmroorderresult','OrderNumber','OrderNumber');
}


    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at', 'created_at', 'updated_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'OrderNumber',
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

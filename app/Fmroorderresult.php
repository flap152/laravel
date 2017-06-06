<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \App\Fmroorder;

/**
 * Class fmroorderresult
 * @package App
 */
class Fmroorderresult extends Model
{

    use SoftDeletes;
    public $timestamps = true;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'fmroorderresult';

   /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at', 'updated_at', 'created_at'];

    protected static $statusCodes = [
        '0' => 'Unknown',
        '1' => 'Pending',
        '2' => 'Assigned',
        '3' => 'Started',
        '4' => 'Completed',
        '5' => 'Cancelled',
        '6' => 'Cancelled by customer',
        '7' => 'cancelled for obstacle (car, fence)',
        '8' => 'Cancelled for weather conditions',
        '9' => 'Cancelled for no payment',
        '10' => 'Cancelled for other reason',
        '11' => 'Request to re-invoice',
    ];


    public static function getStatusCodes()
    {
        return self::$statusCodes;
    }

    public function orderStatusLabel()
    {
        return $this->getStatusCodes()[$this->OrderStatusId ];
    }



    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function fmroorder(){
            return $this->belongsTo('App\Fmroorder','OrderNumber','OrderNumber');
        }


    protected $primaryKey = 'OrderNumber';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];


}


 /*   {
        "OrderNumber": "513191",
  "OrderStatusId": "4",
  "OrderCompletionTime": "2017-03-13 04:18:40",
  "DeliveredContainerName": null,
  "PickedUpContainerName": "12-1201",
  "DeliveredContainerSize": null,
  "ScaleTicketNumber": "1234555",
  "LoadWeight": "4500",
  "DispatcherNotes": null,
  "VehicleName": "V2",
  "TypeOfWaste": "Mix",
  "IsRecurrent": null,
  "OrderStartTime": "2017-03-13 04:17:51",
  "DumpsiteName": "D\u00e9charge 1"
}*/
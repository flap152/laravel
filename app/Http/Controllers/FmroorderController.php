<?php

namespace App\Http\Controllers;

use App\Fmroorder;
use App\Fmroorderresult;
use App\Http\Requests\FmroorderRequest;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Input;
use Redirect;
use View;
use Session;

/**
 * Class FmroorderController
 * @package App\Http\Controllers
 */
class FmroorderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        // get all the fmroorders
        $fmroorders = Fmroorder::all()->load('orderResult');

        // load the view and pass the fmroorders
        return View::make('fmroorders.index')->with('fmroorders', $fmroorders);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        //expect to load from app/resource/views/fmroorders/create.blade.php
        return View::make('fmroorders.create');
    }

    /**
     * Store a newly created resource in storage
     * @param FmroorderRequest $request
     * @return \Illuminate\Http\Response|Redirect
     */
    public function store(FmroorderRequest $request)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
            // store
        Fmroorder::create($request->all());
            // redirect
            Session::flash('message', 'Successfully created order!');
            return redirect('fmroorders');
     //   }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Fmroorder  $fmroorder
     * @return \Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Fmroorder $fmroorder)
    {
        //$fmroorder = Fmroorder::find($id)
        // show the view and pass the fmroorder to it
        return View::make('fmroorders.show')
            ->with('fmroorder', $fmroorder);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Fmroorder  $fmroorder
     * @return \Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Fmroorder $fmroorder)
    {
        // show the edit form and pass the fmroorder
        return View::make('fmroorders.edit')
            ->with('fmroorder', $fmroorder);
    }


    /**
     * @param FmroorderRequest $request
     * @param Fmroorder $fmroorder
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(FmroorderRequest $request, Fmroorder $fmroorder)
    {

        $fmroorder->update($request->all());
            // redirect
        Session::flash('message', 'Successfully updated fmroorder!');
        return Redirect::to('fmroorders');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Fmroorder  $fmroorder
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function destroy(Fmroorder $fmroorder)
    {
        // delete
        //$fmroorder = Fm::find($id);
        $fmroorder->delete();
        // redirect
        Session::flash('message', 'Successfully deleted the Order!');
        return Redirect::to('fmroorders');
    }

    /**
     * @param $post_fields
     * @param $ch
     * @return string
     */
    private function getIt($post_fields, $ch) {
        #global $ch;
        # var_dump($post_fields);
        # set fields in the POST
        curl_setopt( $ch, CURLOPT_POSTFIELDS, http_build_query($post_fields) );
        # echo http_build_query($post_fields);
        # Send request.
        $result = curl_exec($ch);
        return $result;
    }


    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * @internal param Fmroorder $fmroorder
     */
    public function tofm($id)
    {
        $fmroorder = Fmroorder::findOrFail($id);
        $data = $fmroorder->toJson();
        $req_identifier = config('fleetmapper.robridge.req_identifier');
        $url = config('fleetmapper.robridge.url');
        #echo "debug, json data" . $data;
        $ch = curl_init( $url );
        curl_setopt($ch, CURLOPT_POST, 1);
#set proper doc type
        curl_setopt( $ch, CURLOPT_HTTPHEADER, array('application/x-www-form-urlencoded; charset=UTF-8'));
# Return response instead of printing.
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );

# add order example
        $fields = array( 'requestIdentifier' => $req_identifier,
            'jsonData'=> $data,
            'addRoOrder'=>'true',
        );
        $myRes = json_decode($this->getIt($fields, $ch) );

        $fmroorder->status = $myRes->status;
        $fmroorder->save();

        if ($myRes->status == "0") {
            Session::flash('message', 'Successfully sent to FleetMapper!');
            $fmroorder->isInFM = true;
            $fmroorder->save();
            return Redirect::to('fmroorders');
        } else {
            Session::flash('message', 'Error sending to FleetMapper!:'.$myRes->status);
            return Redirect::to('fmroorders');
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * @internal Fmroorder $fmroorder
     * @internal Fmroorderresult $fmroorderresult
     * @internal string $ordernumber
     */
    public function getfmstatus($id)
    {
        $fmroorder = Fmroorder::findOrFail($id);
        $ordernumber = $fmroorder->OrderNumber;
      //  xdebug_break();
        $data = '{"OrderNumber":'.$ordernumber.'}';
        $req_identifier = config('fleetmapper.robridge.req_identifier');
        $url = config('fleetmapper.robridge.url');

        $ch = curl_init( $url );
        curl_setopt($ch, CURLOPT_POST, 1);
#set proper doc type
        curl_setopt( $ch, CURLOPT_HTTPHEADER, array('application/x-www-form-urlencoded; charset=UTF-8'));
# Return response instead of printing.
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );

// get the Roll-off order status
        $fields = array( 'requestIdentifier' => $req_identifier,
            'getRoOrderStatus'=>'true',
            'jsonObject'=> $data,
            'jsonData'=> $data,
        );
        $myRes = json_decode($this->getIt($fields, $ch) );
        $fmroorder->status = $myRes->status;


        $fmroorder->save();

        if ($myRes->status == "0") {
            Session::flash('message', 'Success getting status from FleetMapper! '. json_encode($myRes-> result[0]));
           // var_dump( (array) $myRes->result[0] );
            $fmroorderresult =  Fmroorderresult::updateOrCreate(['OrderNumber'=>$ordernumber], (array)($myRes-> result[0]));
            //$fmroorderresult =  new Fmroorderresult((array)($myRes-> result[0]));
           //$fmroorderresult->OrderNumber = $fmroorder->OrderNumber;
            //$fmroorderresult->save();
            //$fmroorder->orderResult->associate($fmroorderresult);
            $fmroorder->save();
            return Redirect::to('fmroorders');
        } else {
            Session::flash('message', 'Error getting status from FleetMapper!:'.$myRes->status);
            return Redirect::to('fmroorders');
        }
    }

    public function getfmclosedorders($id)
    {
        $fmroorder = Fmroorder::findOrFail($id);
        //xdebug_break();
        $data = '{"OrderNumber":'.$fmroorder->OrderNumber.'}';
        $req_identifier = config('fleetmapper.robridge.req_identifier');
        $url = config('fleetmapper.robridge.url');

        $ch = curl_init( $url );
        curl_setopt($ch, CURLOPT_POST, 1);
#set proper doc type
        curl_setopt( $ch, CURLOPT_HTTPHEADER, array('application/x-www-form-urlencoded; charset=UTF-8'));
# Return response instead of printing.
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );

# add order example
        $fields = array( 'requestIdentifier' => $req_identifier,
            // 'jsonData'=> $data,
            'getClosedRoOrders'=>'true',
        );
        $myRes = json_decode($this->getIt($fields, $ch) );

        $fmroorder->status = $myRes->status;
        $fmroorder->save();

        if ($myRes->status == "0") {
            Session::flash('message', 'Success getting status from FleetMapper! '.$myRes->result);
            return Redirect::to('fmroorders');
        } else {
            Session::flash('message', 'Error getting status from FleetMapper!:'.$myRes->status);
            return Redirect::to('fmroorders');
        }
    }

}
/*
 * 510 - Does not exist (on get status)
 * 506 - Container error on exchange?
 * 515 - Invalid Lat/Lng
 * 377 - Out of Zone Lat Long
 * 1048 Missing required field
 *  525
 *  */
/*
 *
 *
 * Order status
 * 1 - pending
 * 2 - assigned
 * 3- started
 *
{"OrderNumber":"533957","OrderStatusId":"1","OrderCompletionTime":null,"DeliveredContainerName":null,"PickedUpContainerName":null,"DeliveredContainerSize":null,"ScaleTicketNumber":null,"LoadWeight":null,"DispatcherNotes":null,"VehicleName":null,"TypeOfWaste":"Mix","IsRecurrent":"0","OrderStartTime":null,"DumpsiteName":null}
 * */
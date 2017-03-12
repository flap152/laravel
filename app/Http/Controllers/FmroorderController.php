<?php

namespace App\Http\Controllers;

use App\Fmroorder;
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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get all the fmroorders
        $fmroorders = Fmroorder::all();

        // load the view and pass the fmroorders
        return View::make('fmroorders.index')->with('fmroorders', $fmroorders);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //expect to load from app/resource/views/fmroorders/create.blade.php
        return View::make('fmroorders.create');
    }

    /**
     * Store a newly created resource in storage
     * @param FmroorderRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(FmroorderRequest $request)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
            // store
        Fmroorder::create($request->all());
            /*$fmroorder = new Fmroorder();
            $fmroorder->ServiceAddressStreet       = Input::get('ServiceAddressStreet');
            $fmroorder->SizeOfTheContainerToBeDelivered      = Input::get('SizeOfTheContainerToBeDelivered');
            $fmroorder->OrderNumber = Input::get('OrderNumber');
            $fmroorder->save();
*/
            // redirect
            Session::flash('message', 'Successfully created order!');
            return redirect('fmroorders');
     //   }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Fmroorder  $fmroorder
     * @return \Illuminate\Http\Response
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
     * @return \Illuminate\Http\Response
     */
    public function edit(Fmroorder $fmroorder)
    {
        // show the edit form and pass the fmroorder
        return View::make('fmroorders.edit')
            ->with('fmroorder', $fmroorder);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param FmroorderRequest|Request $request
     * @param  \App\Fmroorder $fmroorder
     * @return \Illuminate\Http\Response
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
     * @return \Illuminate\Http\Response
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
     * @param Fmroorder $fmroorder
     * @return \Illuminate\Http\RedirectResponse
     */
    public function tofm($id)
    {
        $fmroorder = Fmroorder::findOrFail($id);
        xdebug_break();
        // echo ("qqqqqqqqqqqq");
        $data = $fmroorder->toJson();
        #echo($order->OrderNumber);
        #echo($data);
        $req_identifier = 'psoft_test'; // for test environment
        $url='http://107.22.170.54/EXTgateway/Gateway.php';
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

        //echo('<br>sadfsdfasdf asdf asdf asdf f');
        //xdebug_break();
        $fmroorder->status = $myRes->status;
        $fmroorder->save();

        if ($myRes->status == "0") {
            // redirect
            Session::flash('message', 'Successfully sent to FleetMapper!');
            return Redirect::to('fmroorders');

        } else {

            // redirect
            Session::flash('message', 'Error sending to FleetMapper!:'.$myRes->status);
            return Redirect::to('fmroorders');
        }
    }

    public function getfmstatus($id)
    {
        $fmroorder = Fmroorder::findOrFail($id);
        xdebug_break();
        $data = '{"OrderNumber":'.$fmroorder->OrderNumber.'}';
//        $data = json_encode($data);
        #echo($order->OrderNumber);
        #echo($data);
        $req_identifier = 'psoft_test'; // for test environment
        $url='http://107.22.170.54/EXTgateway/Gateway.php';

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
            // redirect
            Session::flash('message', 'Success getting status from FleetMapper! '. json_encode($myRes-> result[0]));
            return Redirect::to('fmroorders');

        } else {

            // redirect
            Session::flash('message', 'Error getting status from FleetMapper!:'.$myRes->status);
            return Redirect::to('fmroorders');
        }
    }

    public function getfmclosedorders($id)
    {
        $fmroorder = Fmroorder::findOrFail($id);
        xdebug_break();
        $data = '{"OrderNumber":'.$fmroorder->OrderNumber.'}';
//        $data = json_encode($data);
        #echo($order->OrderNumber);
        #echo($data);
        $req_identifier = 'psoft_test'; // for test environment
        $url='http://107.22.170.54/EXTgateway/Gateway.php';

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
            // redirect
            Session::flash('message', 'Success getting status from FleetMapper! '.$myRes->result);
            return Redirect::to('fmroorders');

        } else {

            // redirect
            Session::flash('message', 'Error getting status from FleetMapper!:'.$myRes->status);
            return Redirect::to('fmroorders');
        }
    }

}


/*
 *
 *
{"OrderNumber":"533957","OrderStatusId":"1","OrderCompletionTime":null,"DeliveredContainerName":null,"PickedUpContainerName":null,"DeliveredContainerSize":null,"ScaleTicketNumber":null,"LoadWeight":null,"DispatcherNotes":null,"VehicleName":null,"TypeOfWaste":"Mix","IsRecurrent":"0","OrderStartTime":null,"DumpsiteName":null}
 * */
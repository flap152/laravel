<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class TempMonitorController extends Controller
{

    public function getTemperatureUsers(){
        $remList = session()->get('remList', function() {
            //http://flaplab03.cloudapp.net/webservicescript/14/getTempUsers?user=WebService1&pass=WebService137
            // Create a client and provide a base URL
            //@TODO: put magic values into configs for volaille application
            $client = new Client([ 'base_uri' =>'http://flaplab03.cloudapp.net/']);
            $response =  $client->get('webservicescript/14/getTempUsers?user=WebService1&pass=WebService137');
            $resp = json_decode($response->getBody());
            return $resp->data;
        });
        $remSelects = array_combine(array_pluck($remList,'id'),array_pluck($remList,'name'));
        session(['remSelects'=>$remSelects]);
        return compact($remSelects);
    }

    public function getTemperaturesForId($remorqueId) {
        //http://traqc.processoft.com/webservicescript/14/getTempForID?uid=51&user=WebService1&pass=WebService137
        //@TODO: put magic values into configs for volaille application
        $client = new Client([ 'base_uri' =>'http://traqc.processoft.com/']);
        $response =  $client->get('webservicescript/14/getTempForID?uid='.$remorqueId.'&user=WebService1&pass=WebService137');
        $resp = json_decode($response->getBody());
        $remData= $resp->data;
        $remData = array_combine(array_pluck($remData,'name'),array_pluck($remData,'value'));
        $remData = array_only($remData,array('Temperature','Temperature2','Temperature3','Temperature4' ));

        return $remData;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$this->getTemperatureUsers();
        return view('frontend.tempMonitor.index')
            ->with(array('remSelects'=>$this->getTemperatureUsers()));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($remorqueId)
    {
        session()->put('remorqueId',$remorqueId);
        if (!$remorqueId) {
            redirect('flap');
        }
        $remData= $this->getTemperaturesForId($remorqueId);
        return view('frontend.tempMonitor.show')
            ->with(['remData'=>$remData]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

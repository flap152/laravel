<?php

namespace App\Http\Controllers;

use App\Fmroorder;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Input;
use Redirect;
use View;
use Session;

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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'name'       => 'required',
            'email'      => 'required|email',
            'fmroorder_level' => 'required|numeric'
        );
        $validator = Validator::make(\Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('fmroorders/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $fmroorder = new Fmroorder();
            $fmroorder->ServiceAddressStreet       = Input::get('ServiceAddressStreet');
            $fmroorder->SizeOfTheContainerToBeDelivered      = Input::get('SizeOfTheContainerToBeDelivered');
            $fmroorder->OrderNumber = Input::get('OrderNumber');
            $fmroorder->save();

            // redirect
            Session::flash('message', 'Successfully created order!');
            return Redirect::to('fmroorders');
        }
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
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Fmroorder  $fmroorder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fmroorder $fmroorder)
    {
        $rules = array(
            'OrderNumber'       => 'required',
            'ServiceAddressStreet'      => 'required',
            'SizeOfTheContainerToBeDelivered' => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('fmroorders/' . $fmroorder->id . '/edit')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            //$fmroorder = F::find($id);
            $fmroorder->OrderNumber       = Input::get('OrderNumber');
            $fmroorder->ServiceAddressStreet      = Input::get('ServiceAddressStreet');
            $fmroorder->SizeOfTheContainerToBeDelivered = Input::get('SizeOfTheContainerToBeDelivered');
            $fmroorder->save();

            // redirect
            Session::flash('message', 'Successfully updated fmroorder!');
            return Redirect::to('fmroorders');
        }
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
}

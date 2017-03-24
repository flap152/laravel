<?php

namespace App\Http\Controllers;

use App\Fmroorderresult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class FmroorderresultController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        // get all the fmroorders
        $fmroorderresults = Fmroorderresult::with('fmroorder')->get();

        // load the view and pass the fmroorders
        return View::make('fmroorderresults.index')->with('fmroorderresults', $fmroorderresults);
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
     * @param  \App\Fmroorderresult $fmroorderresult
     * @return \Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show( Fmroorderresult $fmroorderresult)
    {
        // show the view and pass the fmroorder to it
        return View::make('fmroorderresults.show')
            ->with('fmroorderresult', $fmroorderresult);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Fmroorderresult  $fmroorderresult
     * @return \Illuminate\Http\Response
     */
    public function edit(Fmroorderresult $fmroorderresult)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Fmroorderresult  $fmroorderresult
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fmroorderresult $fmroorderresult)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Fmroorderresult  $fmroorderresult
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fmroorderresult $fmroorderresult)
    {
        //
    }
}

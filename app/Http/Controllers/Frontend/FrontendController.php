<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

/**
 * Class FrontendController.
 */
class FrontendController extends Controller
{
    public function index()
    {
        //return view('frontend.index');
        //TODO: Réactiver page d'accueil en multi application

        return view('frontend.index');
    }

    /**
     * @return \Illuminate\View\View
     */
    /*public function macros()
    {
        return view('frontend.macros');
    }*/
}

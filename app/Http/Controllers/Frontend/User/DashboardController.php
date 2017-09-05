<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use App\Models\Biblio\Document;
use App\Models\Biblio\Vehicule;

/**
 * Class DashboardController.
 */
class DashboardController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $documents = Document::with('vehicule')->get();
        return view('frontend.layouts.dashboard')->with('documents', $documents);
    }
}

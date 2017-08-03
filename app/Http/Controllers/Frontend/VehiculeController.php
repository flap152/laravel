<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Biblio\Vehicule;

class VehiculeController extends Controller
{
    public function index(){

        $vehicules = Vehicule::with('documents')->get();

        return view('frontend.biblio.vehicules-list')->with('vehicules', $vehicules);
    }
}
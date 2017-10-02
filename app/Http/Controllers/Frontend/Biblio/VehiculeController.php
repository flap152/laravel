<?php

namespace App\Http\Controllers\Frontend\Biblio;

use App\Http\Controllers\Controller;
use App\Models\Biblio\Vehicule;
use Illuminate\View\View;

/**
 * Class VehiculeController
 * @package App\Http\Controllers\Frontend\Biblio
 */
class VehiculeController extends Controller
{
    /**
     * @return View
     */
    public function index(){

        $vehicules = Vehicule::paginate(5);

         return view('frontend.biblio.vehicules.list')->with('vehicules', $vehicules);
    }
}
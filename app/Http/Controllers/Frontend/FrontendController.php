<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Frontend\VehiculeController;
use App\Helpers\Frontend\Auth\Socialite;

/**
 * Class FrontendController.
 */
class FrontendController extends Controller
{
    public function index()
    {
        //TODO: Réactiver page d'accueil en multi application

        $user = auth()->user();

        if(auth()->check() && $user->isAllowed()){

            return redirect('/dashboard');
        }
        else{
            /*Si user n'est pas autentifié & autorisé
              Passer les liens socialite à la vue login qui est incluse dans la vue index
             */
            $socialite = new Socialite;
            $socialite_links = $socialite->getSocialLinks();

            $data = array(
                'message' => trans('auth.view_page'),
                'socialite_links' => $socialite_links
            );

            return view('frontend.index')->with($data);
        }
    }

    /**
     * @return \Illuminate\View\View
     */
    /*public function macros()
    {
        return view('frontend.macros');
    }*/
}

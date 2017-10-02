<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
/**
 * Class DashboardController.
 */
class DashboardController extends Controller
{
    /**
     * @return View
     */
    public function index()
    {
        return view('frontend.layouts.dashboard');
    }
}

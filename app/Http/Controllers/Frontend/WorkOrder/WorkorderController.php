<?php

namespace App\Http\Controllers\Frontend\WorkOrder;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

/**
 * Class WorkorderController
 * @package App\Http\Controllers\Frontend
 */
class WorkorderController extends Controller
{
    /**
     * @return View
     */
    public function index(){

        return view('frontend.workorder.workorder');
    }
}
<?php
namespace App\Http\Controllers\Frontend\TimeSheet;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

/**
 * Class TimeSheetController
 * @package App\Http\Controllers\Frontend\TimeSheet
 */
class TimeSheetController extends Controller
{
    /**
     * @return View
     */
    public function index(){

        return view('frontend.timesheet.timesheet');
    }
}
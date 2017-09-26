<?php
namespace App\Http\Composers\Frontend;

use App\Traqc\modules\BiblioModuleTile;
use App\Traqc\Traqc;
use Carbon\Carbon;
use Illuminate\View\View;

class DashboardComposer
{
    public function compose(View $view)
    {
        $documents = BiblioModuleTile::getLatest30DaysDocuments();

        //echo $documents;

        $view->with('moduletile', Traqc::modules());
    }
}
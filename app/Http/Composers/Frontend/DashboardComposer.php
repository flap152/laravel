<?php
namespace App\Http\Composers\Frontend;

use App\Traqc\modules\BiblioModuleTile;
use App\Traqc\Traqc;
use Carbon\Carbon;
use Illuminate\View\View;

class DashboardComposer
{
    /**
     * @param View $view
     */
    public function compose(View $view)
    {
        $moduleTile = Traqc::modules();

        $docs = BiblioModuleTile::getLatest7DaysDocuments();

        $keys = array_keys($docs);
        
        $view->with(compact('moduleTile', 'docs', 'keys'));
    }
}
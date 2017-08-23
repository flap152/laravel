<?php
namespace tests\Biblio\Routes;
use Tests\BrowserKitTestCase;

class LoggedOutRouteTest extends BrowserKitTestCase
{
    public function testVehiculesPageLoggedOut()
    {
        $this->visit('/vehicules')
            ->seePageIs('/login');

        $this->visit('/vehicules/1/documents')
            ->seePageIs('/login');
    }

    public function testDocumentsPageLoggedOut(){

        $this->visit('/documents')
            ->seePageIs('/login');

        $this->visit('/documents/1')
            ->seePageIs('/login');
    }
}
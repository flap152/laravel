<?php
namespace tests\Biblio\Routes;
use Tests\BrowserKitTestCase;

/**
 * Class LoggedInRouteTest.
 */
class LoggedInRouteTest extends BrowserKitTestCase
{
    /**
     * Tester page véhicules
     */
    public function testVehiculesPageLoggedIn(){

        /**
         * Tester s'il y a des véhicules
         */
        $this->actingAs($this->user)
            ->visit('/vehicules')
            ->assertResponseOk();

        /**
         * Tester s'il y a au moins un véhicule
         */
        $this->actingAs($this->user)
            ->visit('/vehicules/1/documents')
            ->assertResponseOk();

        /**
         * Tester reste sur même page s'il y a plusieurs documents
         */
        $this->actingAs($this->user)
            ->visit('/vehicules/2/documents')
            ->seePageIs('/vehicules/2/documents');

        /**
         * Tester redirige vers la page du document s'il y en a juste un
         */
        $this->actingAs($this->user)
            ->visit('/vehicules/4/documents')
            ->seePageIs('/documents/4');
    }

    public function testDocumentsPage(){

        /**
         * Tester s'il y a des documents
         */
        $this->actingAs($this->user)
            ->visit('/documents')
            ->assertResponseOk();

        /**
         * Tester si page info du document
         */
        $this->actingAs($this->user)
            ->visit('/documents/1')
            ->assertResponseOk();
    }

    //TODO: Envoyer email
}
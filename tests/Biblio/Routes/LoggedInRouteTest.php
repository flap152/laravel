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
    public function testVehiculesPageLoggedIn()
    {
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
            ->seePageIs('/vehicules/2/documents')
            ->assertResponseOk();

        /**
         * Tester redirige vers la page du document s'il y en a juste un
         * TODO: Faire un meilleur seeder pour que le test s'applique. En ce moment, le document/véhicule 4 n'est pas garanti d'avoir juste un véhicule. suggestion: Créer dynamiquement puis défaire ce véhicule (trabsaction)
         */
        /*$this->actingAs($this->user)
            ->visit('/documents/4')
            ->seePageIs('/documents/4');*/
    }

    public function testDocumentsPage()
    {
    }

    //TODO: Envoyer email
}
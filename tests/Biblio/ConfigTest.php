<?php
/**
 * Created by PhpStorm.
 * User: Loriane
 * Date: 2017-08-30
 * Time: 11:57
 */
use Tests\BrowserKitTestCase;

class ConfigTest extends BrowserKitTestCase
{
    public function testStorageFolderExists(){
        self::assertDirectoryExists(storage_path('Biblio'));
    }
}
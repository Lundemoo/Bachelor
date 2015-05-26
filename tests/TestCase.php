<?php namespace Tests\Integration;

use Laracasts\Integrated\Extensions\Laravel as IntegrationTest;

class TestCase extends IntegrationTest {

   
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

        return $app;
    }

}

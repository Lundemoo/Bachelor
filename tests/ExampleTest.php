<?php use Laracasts\Integrated\Extensions\Laravel as IntegrationTest;
use Laracasts\TestDummy\Factory as TestDummy;

class ExampleTest extends IntegrationTest {
    public function it_display_all_posts() {
        TestDummy::create('App\Car', ['registrationNR'=>'VF8900'],['nickname'=>'Pelle'],['brand'=>'Nissan']);
        $this->visit('car')->andSee('Pelle','VF8900');
    }
}
<?php

use Laracasts\Integrated\Extensions\Laravel as IntegrationTest;

class ExampleTest extends IntegrationTest {

public function it_display_all_posts()
{
    $this->visit('car');
}

}

<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class SiteHomeTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function test_can_visit_home_page(): void
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->visit('/')
                ->assertSee('ACME');
        });
    }
}

<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class HomePageTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testIsHomePage(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('http://127.0.0.1:8000/')
                    ->assertSee('Laracasts');
        });
    }
}

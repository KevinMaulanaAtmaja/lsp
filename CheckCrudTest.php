<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CheckCrudTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testIsCrudWorks(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('http://127.0.0.1:8000/crud')
                    ->clickLink('Create Product')
                    ->type('name', 'value')
                    ->radio('radio_input', 'radio_value')
                    ->check('#checkbox')
                    ->click('#date')
                    ->press('Submit form')
                    ->waitForLocation('/crud')
                    ->assertSee('Crud Berhasil ')

                    ->pause(10000);
        });
    }
}

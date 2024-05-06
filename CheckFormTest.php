<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CheckFormTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testIsFormWorks(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('http://127.0.0.1:8000/testpage')
                    ->waitForLocation('/testpage')
                    ->type('text_input', 'Field the Text')
                    ->select('select_option', '1')
                    ->radio('radio', 'radioCheck')
                    ->check('#checkbox')
                    ->scrollIntoView('#date')
                    ->pause(1000)
                    ->click('#date')
                    ->within('.datepicker-dropdown', function(Browser $browser){
                        $browser->click('table > tbody > tr:nth-child(3) > td:nth-child(5)');
                    })
                    ->attach('file', public_path('images/img'))

                    ->press('Open Modal')
                    ->pause(1000)
                    ->within('#exampleModal', function(Browser $browser){
                        $browser->type('name_input', 'value')
                        ->press('Close btn');
                        ;
                    })
                    ->press('Show alert')
                    ->assertDialogOpened('alert text')
                    ->acceptDialog()

                    ->press('Show Confirm Dialog')
                    ->assertDialogOpened('dialog text confirm?')
                    ->dismissDialog()
                    
                    ->press('Show Confirm Dialog')
                    ->assertDialogOpened('dialog text confirm?')
                    ->acceptDialog()




                    ->pause(10000)
                    ;
        });
    }

    public function testEditForm(){
        $this->browse(function(Browser $browser){
            $browser->scrollIntoView('#pagination ')
            ->pause(2000)
            ->click('copy selector')
            ->waitForLocation('/crud')
            ->click('tbody ')
            ->pause(3000)
            ->waitForText('Edit Crud')
            ->assertInputValue('name', 'testName')
            ->assertInputValue('number', 'numbertest')
            ->radio('radio', 'radioCheck')
            ->check('#checkbox');
        });
    }
}

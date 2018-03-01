<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Laravel\Dusk\Chrome;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class RegisterTest extends DuskTestCase
{

    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
         $this->browse(function ($browser) {
            $browser->visit('/register')
             ->type('name','Geek Manu')
             ->type('email','emashmagak@appslab'.rand(100,9999).'.co.ke')
             ->type('password','admin1234')
             ->type('password_confirmation','admin1234')
             ->press('Register')
             ->assertPathIs('/home')
             ->assertSee('You are logged in!');
        });
    }
}

<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;


class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $user = factory(\App\Models\User::class)->make();

        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee(trans('auth/general.login_prompt'));
        });
    }
}

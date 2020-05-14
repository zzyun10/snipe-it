<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SettingsControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test that the user is redirected to /setup if the system is not setyp
     *
     * @test
     */
    public function redirect_to_setup_if_not_setup()
    {
        $this->markTestIncomplete();

        $response = $this->get(url('/'));
        $response->assertStatus(302);
        $response->assertRedirect(url('/setup'));
    }

    /**
     * Test that the user is redirected to home if the system is setyp
     *
     * @test
     */
    public function redirect_to_dashboard_if_setup()
    {
        $this->markTestIncomplete();
        $user = factory(User::class)->create();
        $setting = factory(Setting::class)->create();

        $response = $this->get(url('/'));
        $response->assertStatus(302);
        $response->assertRedirect(url('/setup'));
    }
}

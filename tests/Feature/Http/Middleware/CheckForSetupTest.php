<?php

namespace Tests\Feature\Http\Middleware;

use App\Models\Setting;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CheckForSetupTest extends TestCase
{
    /**
     * @test
     */
    public function it_redirects_to_quickstart_if_not_setup()
    {
        $response = $this->get('/');

        // This sucks, but is temporary until I can create some macros
        // to better handle this
        if (Setting::setupCompleted()) {
            $response->assertStatus(302);
            $response->assertRedirect(route('login'));
        } else {
            $response->assertStatus(302);
            $response->assertRedirect(route('setup'));
        }

    }
}

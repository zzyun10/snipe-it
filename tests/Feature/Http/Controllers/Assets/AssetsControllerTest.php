<?php

namespace Tests\Feature\Http\Controllers\Assets;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AssetsControllerTest extends TestCase
{

    use RefreshDatabase;

    /**
     * @test
     */
    public function create_returns_a_view()
    {
        // Allow for full error stack
        $this->withoutExceptionHandling();

        // Let phpunit know we have to come back to this
        $this->markTestIncomplete();

        $this->assertTrue(true);

//        $response = $this->get(route('hardware.index'));
//
//        $response->assertStatus(200);
//        $response->assertViewIs('hardware.index');
    }
}

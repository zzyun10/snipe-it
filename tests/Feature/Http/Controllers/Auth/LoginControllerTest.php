<?php

namespace Tests\Feature\Http\Controllers\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class LoginControllerTest extends TestCase
{

    use RefreshDatabase;

    /**
     * @test
     */
    public function login_redirects_to_dashboard()
    {
        $this->markTestIncomplete();
//
//        $user = factory(User::class)->create();
//
//        $response = $this->post(route('login'), [
//            'username' => $user->username,
//            'password' => 'password'
//        ]);
//
//        $response->assertStatus(302);
//        $response->assertRedirect(route('home'));
//        $this->assertAuthenticatedAs($user);
    }
}

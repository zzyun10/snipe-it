<?php

namespace Tests\Unit\Http\Requests;

use App\Models\User;
use Tests\TestCase;
use App\Http\Requests\SaveUserRequest;


class SaveUserRequestTest extends TestCase
{


    private $subject;


    /**
     * set up the SaveUserRequest subject for use throughout the test
     */
    protected function setUp(): void {

        parent::setUp();

        $this->subject =  new SaveUserRequest();
    }


    /**
     * @test
     */
    public function authorize_returns_true_when_authenticated()
    {
        $user = factory(User::class)->make();
        $this->actingAs($user);

        $this->assertTrue($this->subject->authorize());
    }


    //    We don't test the rules here yet since they are overridden based on whether it's a POST, PATCH
    //    OR GET request because of custom password requirements. We can test these in the Feature test instead.
    //
//    /**
//     * @test
//     */
//    public function rules()
//    {
//
//    }




}

<?php

namespace Tests\Unit;

use App\Models\Department;
use Tests\TestCase;

class DepartmentTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */


    /**
     * set up the SaveUserRequest subject for use throughout the test
     */
    protected function setUp(): void {

        parent::setUp();

        $this->subject =  new Department();
    }

    public function testExample()
    {
        $this->assertTrue(true);
    }
}

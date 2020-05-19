<?php

namespace Tests\Unit;

use App\Models\Location;
use Tests\TestCase;

class LocationTest extends TestCase
{
    /**
     * @test
     */
    public function check_location_cannot_be_its_own_parent() {
        $location = factory(Location::class)->make(['id' => 10, 'parent_id' => 10]);
        $this->assertTrue($location->isInvalid());
    }

}

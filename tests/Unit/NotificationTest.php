<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Category;
use App\Models\AssetModel;
use App\Models\Setting;
use App\Models\Asset;
use App\Notifications\CheckoutAssetNotification;
use Illuminate\Support\Facades\Notification;

class NotificationTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_sends_notifications_if_required_by_category()
    {

        $this->markTestIncomplete();

        $this->assertTrue(true);

    }
}

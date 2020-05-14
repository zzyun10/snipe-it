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
    public function it_sends_notifications_if_category_requires()
    {

        factory(Setting::class)->create( ['auto_increment_assets' => true]);

        $category = factory(Category::class)
            ->states('asset-laptop-category')->create( ['require_acceptance' => true]);

        $model = factory(AssetModel::class)
            ->states('mbp-13-model')->create(['category_id' => $category->id]);

        $asset = factory(Asset::class)
            ->create(['model_id' => $model->id]);

        $user = factory(User::class)
            ->create();

        Notification::fake();
        $asset->checkOut($user, 1);
        Notification::assertSentTo($user, CheckoutAssetNotification::class);
    }
}

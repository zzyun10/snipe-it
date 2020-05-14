<?php
use Faker\Generator as Faker;
use App\Models\Accessory;


/*
|--------------------------------------------------------------------------
| Accessory Factories
|--------------------------------------------------------------------------
|
| Factories related exclusively to creating accessories
|
*/

$factory->define(Accessory::class, function (Faker $faker) {
    return [
        'user_id' => 1,
        'model_number' => $faker->numberBetween(1000000, 50000000),
        'location_id' => rand(1,5),
    ];
});

$factory->state(Accessory::class, 'apple-bt-keyboard', function ($faker) {

    return [
        'name' => 'Bluetooth Keyboard',
        'image' => 'bluetooth.jpg',
        'category_id' => 8,
        'manufacturer_id' => 1,
        'qty' => 10,
        'min_amt' => 2,
        'supplier_id' => rand(1,5)
    ];

});

$factory->state(Accessory::class, 'apple-usb-keyboard', function ($faker) {

    return [
        'name' => 'USB Keyboard',
        'image' => 'usb-keyboard.jpg',
        'category_id' => 8,
        'manufacturer_id' => 1,
        'qty' => 15,
        'min_amt' => 2,
        'supplier_id' => rand(1,5)
    ];

});

$factory->state(Accessory::class, 'apple-mouse', function ($faker) {

    return [
        'name' => 'Magic Mouse',
        'image' => 'magic-mouse.jpg',
        'category_id' => 9,
        'manufacturer_id' => 1,
        'qty' => 13,
        'min_amt' => 2,
        'supplier_id' => rand(1,5)
    ];

});

$factory->state(Accessory::class, 'microsoft-mouse', function ($faker) {

    return [
        'name' => 'Sculpt Comfort Mouse',
        'image' => 'comfort-mouse.jpg',
        'category_id' => 9,
        'manufacturer_id' => 2,
        'qty' => 13,
        'min_amt' => 2
    ];

});


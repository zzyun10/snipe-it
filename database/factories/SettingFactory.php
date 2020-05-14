<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;


$factory->define(App\Models\Setting::class, function (Faker $faker)  {
    return [
        'site_name' => $faker->words(3, true),
    ];
});

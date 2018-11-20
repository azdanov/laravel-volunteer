<?php

declare(strict_types=1);

use App\Models\Category;
use App\Models\Listing;
use App\Models\Region;
use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

/** @var Factory $factory */
$factory->define(Listing::class, static function (Faker $faker) {
    $date = $faker->dateTimeThisYear();

    return [
        'title' => $faker->catchPhrase(),
        'body' => $faker->realText(255),
        'user_id' => User::all()->random()->id,
        'region_id' => Region::where('usable', true)->get()->random()->id,
        'category_id' => Category::where('usable', true)->get()->random()->id,
        'live' => $faker->boolean(80),
        'featured' => $faker->boolean(70),
        'paid' => $faker->boolean(60),
        'created_at' => $date,
        'updated_at' => $date,
    ];
});

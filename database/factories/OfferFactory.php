<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Models\Offer;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Offer::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'price' => $faker ->numberBetween(10000,100000),
        'description' => $faker->text(),
    ];
});

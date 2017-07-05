<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'last_name' => $faker->lastName,
        'phone' => $faker->phoneNumber,
        'address' => $faker->address,
        'rut' => $faker->randomNumber(5),
        //'role' => $faker->randomElement(['admin','user','client']),
        'role' => 'client',
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Product::class, function (Faker\Generator $faker) {
    return [
        'code' => $faker->randomNumber(8),
        'name' => $faker->words(3, true),
        'cost' => $faker->randomNumber(4),
        'price' => $faker->randomNumber(5),
        'brand' => $faker->unique()->company,
        'model' => $faker->unique()->word,
        'stock' => $faker->randomNumber(2),
        'category_id' => rand(1,5),

    ];
});

$factory->define(App\Service::class, function (Faker\Generator $faker) {
    return [
        'code' => $faker->randomNumber(8),
        'name' => $faker->words(5, true),
        'hh' => $faker->randomFloat(1, 0, 2),
        'description' => $faker->paragraph
    ];
});

$factory->define(App\Vehicle::class, function (Faker\Generator $faker) {
    return [
        'brand' => $faker->word,
        'model' => $faker->word,
        'year' => $faker->date('Y'),
        'vin' => $faker->randomNumber(8),
        'motor' => $faker->randomFloat(1, 1, 8),
        'patente' => $faker->randomNumber(8),
        'km' => $faker->randomElement(['232.000','389.000','74.000','458.000','155.000','856.000','824.000','735.000','632.000','789.000','474.000','358.000','355.000','756.000','724.000','635.000']),

    ];
});

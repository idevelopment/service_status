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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'mobile_phone' => $faker->phoneNumber,
        'office_phone' => $faker->phoneNumber,
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\countries::class, function (Faker\Generator $faker) {
    return [ 'country' => $faker->country ];
});

$factory->define(App\Label::class, function (Faker\Generator $faker) {
    return [
        'name'        => $faker->name,
        'color'       => $faker->hexColor,
        'description' => $faker->text(200)
    ];
});

$factory->define(App\Comments::class, function (Faker\Generator $faker) {
    return [
        'user_id' => 1,
        'comment' => $faker->words(3, true)
    ];
});

$factory->define(App\Incidents::class, function (Faker\Generator $faker) {
    return [
        'title'     => 'required',
        'assigned'  => 1,
        'status'    => 'open',
        'message'   => 'message body',
        'services'  => 1,
    ];
});

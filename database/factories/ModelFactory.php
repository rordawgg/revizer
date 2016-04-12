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
        'remember_token' => str_random(10),
        'created_at' => $faker->dateTimeBetween('-2 years', '-1 years'),
        'updated_at' => $faker->dateTimeBetween('-6 months', 'now'),
    ];
});

$factory->define(App\Doc::class, function (Faker\Generator $faker){
    return [
        'user_id' => $faker->randomDigitNotNull,
        'title' => $faker->realText(30),
        'description' => $faker->realText(150),
        'criteria' => $faker->realText(100),
        'body' => $faker->paragraph(5),
        'active_revision' => $faker->randomDigitNotNull,
        'created_at' => $faker->dateTimeBetween('-2 years', '-1 years'),
        'updated_at' => $faker->dateTimeBetween('-6 months', 'now'),
        
    ];
});

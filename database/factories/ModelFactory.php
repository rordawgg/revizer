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
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt('password'),
        'remember_token' => str_random(10),
        'created_at' => $faker->dateTimeBetween('-2 years', '-1 years'),
        'updated_at' => $faker->dateTimeBetween('-6 months', 'now'),
    ];
});
$factory->define(App\Profile::class, function (Faker\Generator $faker){
    return [
        'user_id' => $faker->randomDigitNotNull,
        'username' => strtolower(
            str_replace(' ', '', $faker->unique()->name('male'|'female'))),
        'first_name' => $faker->firstName(),
        'last_name' => $faker->lastName(),
        'avatar' => md5($faker->text(15)),
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
        'created_at' => $faker->dateTimeBetween('-2 years', '-1 years'),
        'updated_at' => $faker->dateTimeBetween('-6 months', 'now'),
        
    ];
});

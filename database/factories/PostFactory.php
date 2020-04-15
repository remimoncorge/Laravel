<?php

use Illuminate\Support\Str;
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

$factory->define(App\Post::class, function (Faker $faker) {
    $users = App\User::pluck('id')->toArray();
    return [
        'user_id' => $faker->randomElement($users),
        'post_content' => $faker->paragraph(),
        'post_title' => $faker->sentence(),
        'post_status' => $faker->randomElement(['PUBLIED','DRAFT']),
        'post_name' => $faker->firstName(),
        'post_type' => 'article',
        'image_file'  => $faker->imageUrl(),
        'post_category' => $faker->randomElement(['vie', 'sociale', 'actualiste']),
    ];
});
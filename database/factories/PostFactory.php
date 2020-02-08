<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'user_id' => \App\User::all()->random()->id,
        'blog_id' =>1,
        'title' => $faker->sentence,
        'description' => $faker->paragraph,
        'publication_date'=>$faker->date('Y-m-d H:i:s'),
    ];
});
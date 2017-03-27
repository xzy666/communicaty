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
        'email' => $faker->email,
        'avatar'=>$faker->imageUrl(200,200),
        'confirm_code'=>str_random(64),
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});
$factory->define(App\Discussion::class, function (Faker\Generator $faker) {
    $user = \App\User::lists('id')->toArray();
    return [
        'title' => $faker->sentence,
        'content' => $faker->paragraph,
        'user_id' =>$faker->randomElement($user),
        'last_user_id' =>$faker->randomElement($user),
    ];
});
$factory->define(App\Comment::class, function (Faker\Generator $faker) {
    $user = \App\User::lists('id')->toArray();
    $discussion=\App\Discussion::lists('id')->toArray();
    return [
        'content' => $faker->paragraph,
        'user_id' =>$faker->randomElement($user),
        'discussion_id'=>$faker->randomElement($discussion),
    ];
});

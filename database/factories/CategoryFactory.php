<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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
$factory->define(Category::class, function (Faker $faker) {
    return [
        'product_title' => $faker->word,
        'description' => $faker->realText($maxNbChars=200),
        'category_id'=>$faker->numberBetween(0,2),
        'is_active'=>true,
        
    ];
});
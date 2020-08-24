<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Storage;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'name_author' => $faker->name,
        'category_id' => $faker->numberBetween(1,31),
        'image_path' => Storage::url('public/demo/'.$faker->numberBetween(1,10).'.jpeg'),
        'image_name' => $faker->text(10),
        'user_id' => 10,
        'content' => $faker->name,
    ];
});

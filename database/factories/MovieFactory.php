<?php

use Faker\Generator as Faker;
use App\Movie;
$factory->define(Movie::class, function (Faker $faker) {
    return [
        'title' => $faker->words($nb = 3, $asText = true),
        'director'=> $faker->name,  
        'imageUrl'=> $faker->imageUrl($width = 640, $height = 480, 'cats'),
        'duration' => $faker->biasedNumberBetween($min = 10, $max = 500),
        'releaseDate' => $faker->date($format = 'Y-m-d', $max = 'now'),  
        'genre' => 'action'
    ];
});

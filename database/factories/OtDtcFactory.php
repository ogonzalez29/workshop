<?php

use Faker\Generator as Faker;

$factory->define(App\Otdtc::class, function (Faker $faker) {
    return [
        'doc_id' => create('App\Otdocs')->id,
		'doc_number' => $faker->randomDigit,
		'image_name' => $faker->slug.'.jpg',
		'image_url' => $faker->imageUrl(640, 480)
    ];
});

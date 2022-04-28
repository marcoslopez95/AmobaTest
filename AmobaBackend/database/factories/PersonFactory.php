<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Person;
use Faker\Generator as Faker;

$factory->define(Person::class, function (Faker $faker) {
    return [
        'first_name'  => $faker->firstName(),
        'last_name'   => $faker->lastName(),
        'ima_profile' => $faker->imageUrl(),
        'document'    => $faker->word(),
        'type_person' => $faker->digb ->optional(0.6,0)
    ];
});

<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Person;
use Faker\Generator as Faker;

$factory->define(Person::class, function (Faker $faker) {
    return [
        'first_name'  => $faker->firstName(),
        'last_name'   => $faker->lastName(),
        'ima_profile' => 'storage/img_profile.png',
        'document'    => $faker->word(),
        'type_person' => $faker->randomElement(['0', '1'])

    ];
});

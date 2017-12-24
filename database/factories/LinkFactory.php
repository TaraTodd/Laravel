<?php

use Faker\Generator as Faker;

/* @var Illuminate\Database\Eloquent\Factory $factory */
//the model factory files that allow us to generate fake model data that we can use to fill our development database and tests

$factory->define(App\Link::class, function (Faker $faker) {
    return [
        // added code
        'title' => substr($faker->sentence(2), 0, -1), //We use the $faker->sentence() method to generate a title, and substr to remove the period at the end of the sentence.
        'url' => $faker->url,
        'description' => $faker->paragraph,
    ];
});

<?php

use Faker\Generator as Faker;



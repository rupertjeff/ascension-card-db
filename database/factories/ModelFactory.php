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

use App\Database\Model\Card;
use App\Database\Model\Expansion;
use App\Database\Model\Faction;

$factory->define(App\User::class, function ($faker) {
    return [
        'name'           => $faker->name,
        'email'          => $faker->email,
        'password'       => str_random(10),
        'remember_token' => str_random(10),
    ];
});

$factory->define(Card::class, function (\Faker\Generator $faker) {
    $expansionIds = Expansion::all()->pluck('id')->toArray();
    $factionIds   = Faction::all()->pluck('id')->toArray();

    return [
        'expansion_id' => $faker->randomElement($expansionIds),
        'faction_id'   => $faker->randomElement($factionIds),
        'name'         => $faker->words(2, true),
        'type'         => $faker->randomElement(['hero', 'construct', 'monster']),
        'effect'       => $faker->sentences(4, true),
        'quote'        => $faker->sentences(3, true),
        'honor'        => $faker->randomDigit,
    ];
});

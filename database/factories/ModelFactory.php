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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),

    ];
});

$factory->define(App\League::class,function(Faker\Generator $faker)){

	return[
		'nom' => $faker->name,
		'id_class' => $faker->numberBetween($min= 1, $max=10);
	]

	DB::Table('');
}

$factory->define(App\Season::class,function(Faker\Generator $faker){
  $league = DB::table('leagues')->get()->random();
  $date = Carbon\Carbon::now();
  return[
    'name' => $faker-<name,
    'start_date' => $date,
    'end_date' => $date->addYear();,
    'league_id' => $league->id();
  ]
});

$factory->define(App\Team::class,function(Faker\Generator $faker)){

	return[
		'nom' => $faker->name,
		'ligue_id' => DB::Table('leagues')->get()->random()->id();
	]
}

$factory->define(App\Player::class, function (Faker\Generator $faker) {

    return [
        'first_name' => $faker->name,
        'last_name'=> $faker->name,
        'number' => $faker->randomDigitNotNull,
        'team_id'=> DB::Table('teams')->get->random()->id(),
        'position_id' => $faker->numberBetween($min = 1, $max=4),

    ];
});

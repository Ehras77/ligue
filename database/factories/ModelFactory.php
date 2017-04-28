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
		'id_class' => $faker->numberBetween($min= 1, $max=10),
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
		'ligue_id' => DB::Table('leagues')->get()->random()->id(),
		'user_id' => DB::Table('users')->get()->random()->id(),
	]
}

$factory->define(App\Stats::class,function(Faker\Generator $faker)){

	return[
		'player_id' => DB::Table('players')->get()->randomm()->id(),
		'match_id' => DB::Table('matches')->get()->random()->id(),
		'stat_type_id' => $faker->numberBetween($min=1, $max=4),
		'temps_cadran' => $faker->time($format = 'H:i:s', $max = 'now'),
		'periode' => $faker->numberBetween($min=1, $max=3),

	]
}

$factory->define(App\Match::class,function(Faler\Generator $faker)){

	return[
		'season_id' => DB::Table('seasons')->get()->random()->id(),
		$localTeam = DB::Table('teams')->get()->random();
		$visitorTeam = DB::Table('teams')->get()->random()->where('team_id','!=',$localTeam->id());

		'local_team_id' => $localTeam->$id,
		'visiting_team_id' => $visitorTeam->id,
		'location' => $faker->city,
		
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

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
$factory->define(App\User::class, function (Faker\Generator $faker){
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),

    ];
});

$factory->define(App\League::class,function(Faker\Generator $faker){


       	$leagueClass = array('A','AAA','B','CC','Papillon');
	return[
		'name' => $faker->name,
		'league_class' => $leagueClass[rand(0,4)],
	];
});


$factory->define(App\Season::class,function(Faker\Generator $faker){

	$league = DB::Table('leagues')->get()->random();
	return[
		'start_date'=> $faker->dateTimeInInterval($startDate = '-30 years', $interval = '+ 1 years', $timezone = date_default_timezone_get()),
		'end_date' => $faker->dateTimeInInterval($startDate = '-29 years', $interval = '+ 1 years', $timezone = date_default_timezone_get()),
		'name' => $faker->name,
		'league_id' =>$league->id,
		];
});

$factory->define(App\Team::class,function(Faker\Generator $faker){

	return[
		'name' => $faker->name,
		'league_id' => DB::Table('leagues')->get()->random()->id,
		'user_id' => DB::Table('users')->get()->random()->id,
	];
});

$factory->define(App\Stats::class,function(Faker\Generator $faker){

			$statType = array('But','Passe','Pen. Majeure','Pen. Mineur');
			$player = DB::Table('players')->get()->random();
			$teamid = DB::Table('player_team')->where('player_id',$player->id)->first()->team_id;
	return[
		'player_id' => $player->id,
		'match_id' => DB::Table('matches')->where('local_team_id',$teamid)->orWhere('visiting_team_id',$teamid)->get()->random()->id,
		'stat_name' => $statType[rand(0,3)],
		'temps_cadran' => $faker->time($format = 'H:i:s', $max = '20:00:00'),
		'periode' => $faker->numberBetween($min=1, $max=3),

	];
});

$factory->define(App\Match::class,function(Faker\Generator $faker){

		$localTeam = DB::Table('teams')->get()->random();
		$visitorTeam = DB::Table('teams')->where('id','!=',$localTeam->id)->get()->random();
		$scoreLocal = rand(0,9);
		$scoreVisit = rand(0,9);

		if($scoreLocal >= $scoreVisit){
			$winningTeam = $localTeam->name;
			$losingTeam = $visitorTeam->name;
		}
		else
		{
			$winningTeam = $visitorTeam->name;
			$losingTeam = $localTeam->name;
		}

		$season = DB::Table('seasons')->get()->random();

		$timestampDebut = strtotime($season->start_date);//pour avoir un match qui est dans la meme periode que ligue
		$timestampFin = strtoTime($season->end_date);

		$date = date('Y-m-d H:i:s',rand($timestampDebut,$timestampFin));


	return[
		'season_id' => $season->id,

		'local_team_id' => $localTeam->id,
		'visiting_team_id' => $visitorTeam->id,
		'location' => $faker->city,
		'winning_team' => $winningTeam,
        'losing_team' => $losingTeam,
        'final_score_local' => $scoreLocal,
        'final_score_visitor' => $scoreVisit,
        'date' => $date,	//$faker->dateTimeThisYear($max = 'now', $timezone = date_default_timezone_get()),
		
	];
});

$factory->define(App\Player::class, function (Faker\Generator $faker) {

    return [
        'first_name' => $faker->name,
        'last_name'=> $faker->name,
        'number' => $faker->randomDigitNotNull,
        'position_id' => $faker->numberBetween($min = 1, $max=4),

    ];
});

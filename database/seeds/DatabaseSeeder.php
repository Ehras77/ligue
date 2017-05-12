<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);


       	$positions = array('Centre','Ailier','Défenseur','Goaler');

       	foreach($positions as $pos){
       			DB::table('positions')->insert([
		            'position_name' => $pos,
		        ]);
       	}


        $roles = array('Admin','teamAdmin','registered');

        foreach($roles  as $role){
        	    DB::table('roles')->insert([
		            'role_name' => $role,
		        ]);
        }



       	factory(App\League::class,10)->create();
       	factory(App\Season::class,100)->create();
       	factory(App\User::class,800)->create();
       	factory(App\Team::class,50)->create();
      	factory(App\Match::class,500)->create();
       	factory(App\Player::class,500)->create()->each(function($player){

       		$team = DB::Table('teams')->get()->random();

       		DB::Table('player_team')->insert([
       			'player_id' => $player->id,
       			'team_id' => $team->id,
			]);


       		$continue = true;

       if (rand(0,100) > 50){
       		while($continue == true){
       			$user = DB::Table('users')->get()->random()->id;

       			if($user == DB::Table('users')->get()->count()){
       				$continue = false;
       			}
       			$contains = DB::Table('players')->get()->whereInStrict('user_id',$user);
       			if ($contains->isEmpty()){

       				
       				DB::table('players')->where('id',$player->id)->update(array('user_id' => $user));
       				DB::table('users')->where('id',$user)->update(array('player_id'=> $player->id));
					$continue = false;
       			}

       		}
       	}
       	});

        factory(App\Stats::class,1000)->create();
       	







    }
}

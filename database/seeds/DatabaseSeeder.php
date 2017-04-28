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

        factory(App\Player::class,5)->create();
       	factory(App\User::class,10)->create();


       	$positions = {'Centre','Ailier','Défenseur','Goaler'}

       	for(int $i =0;$i<$positions.length;$i++){

		       	DB::table('positions')->insert([
		            'position_name' => $positions[$i],
		        ]);

       	}

        $roles = {'Admin','teamAdmin'}

        for(int $j =0;$j<$roles.length;$j++){

		       	DB::table('roles')->insert([
		            'role_name' => $roles[$j],
		        ]);

       	}







    }
}

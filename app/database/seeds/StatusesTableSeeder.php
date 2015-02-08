<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use controllers\commands\Status;
use Faker\Factory as Faker;

class StatusesTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();
        $users = User::lists('id');
		foreach(range(1, 50) as $index)
		{
			Status::create([
                'user_id' => $faker->randomElement($users),
                'body' => $faker->sentence()
			]);
		}
	}

}
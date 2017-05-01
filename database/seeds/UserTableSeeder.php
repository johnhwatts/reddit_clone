<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UserTableSeeder extends DatabaseSeeder
{
	public function run()
	{
		$this->realUsers();
        $this->fakeUsers();
	}

	protected function realUsers()
   {
	   $user = new \App\User();
	   $user->name = 'John';
	   $user->email = 'johnwatts@gmx.com';
	   $user->password = Hash::make('password');
	   $user->save();
   }

	protected function fakeUsers()
	{
	$faker = Faker\Factory::create();

	for($i = 0; $i <= 50; $i++) {
		$user = new \App\User();
		$user->name = $faker->name;
		$user->email = $faker->email;
		$user->password = bcrypt('password');
		$user->save();
		}
	}
}

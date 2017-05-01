<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UserTableSeeder extends DatabaseSeeder
{
	public function run()
	{
		  $user1 = new App\User();
		  $user1->email = 'user1@codeup.com';
		  $user1->name = 'Luis';
		  $user1->password = Hash::make('password123');
		  $user1->save();

		  $user2 = new App\User();
		  $user2->email = 'user2@codeup.com';
		  $user2->name = 'Cam';
		  $user2->password = Hash::make('password123');
		  $user2->save();

		  $user2 = new App\User();
		  $user2->email = 'user3@codeup.com';
		  $user2->name = 'John';
		  $user2->password = Hash::make('password123');
		  $user2->save();

		  $user2 = new App\User();
		  $user2->email = 'user4@codeup.com';
		  $user2->name = 'Bob';
		  $user2->password = Hash::make('password123');
		  $user2->save();

		  $user2 = new App\User();
		  $user2->email = 'user5@codeup.com';
		  $user2->name = 'Jim';
		  $user2->password = Hash::make('password123');
		  $user2->save();

		  $user2 = new App\User();
		  $user2->email = 'user6@codeup.com';
		  $user2->name = 'Joe';
		  $user2->password = Hash::make('password123');
		  $user2->save();

		  $user2 = new App\User();
		  $user2->email = 'user7@codeup.com';
		  $user2->name = 'Steve';
		  $user2->password = Hash::make('password123');
		  $user2->save();

		  $user2 = new App\User();
		  $user2->email = 'user8@codeup.com';
		  $user2->name = 'Simon';
		  $user2->password = Hash::make('password123');
		  $user2->save();

		  $user2 = new App\User();
		  $user2->email = 'user9@codeup.com';
		  $user2->name = 'Jenny';
		  $user2->password = Hash::make('password123');
		  $user2->save();

		  $user2 = new App\User();
		  $user2->email = 'user10@codeup.com';
		  $user2->name = 'Helen';
		  $user2->password = Hash::make('password123');
		  $user2->save();
	}

	
}

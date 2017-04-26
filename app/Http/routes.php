<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@showWelcome');

Route::get('/sayhello/{name?}', 'HomeController@sayHello');

Route::get('/uppercase/{word?}', 'HomeController@uppercase');

Route::get('/increment/{number?}', 'HomeController@increment');

Route::get('/add/{num1?}/{num2?}', 'ExampleController@add');

Route::get('/rolldice/{guess?}', 'ExampleController@diceroll');

Route::resource('posts', 'PostsController'); // A resource controller

Route::get('orm-test', function ()
{
	// $user = new \App\User();
	// $user->name = 'John';
	// $user->email = 'johnwatts@gmx.com';
	// $user->password = 'password';
	// $user->save();
	//
	// $post1 = new \App\Models\Post();
	// $post1->title = 'Eloquent is awesome!';
	// $post1->url='https://laravel.com/docs/5.1/eloquent';
	// $post1->content  = 'It is super easy to create a new post.';
	// $post1->created_by = 1;
	// $post1->save();
	//
	// $post2 = new \App\Models\Post();
	// $post2->title = 'Eloquent is really easy!';
	// $post2->url='https://laravel.com/docs/5.1/eloquent';
	// $post2->content = 'It is super easy to create a new post.';
	// $post2->created_by = 1;
	// $post2->save();

	$posts = \App\Models\Post::all();
	return $posts;
});

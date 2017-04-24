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

Route::get('/uppercase/{word?}', function($word = "Word") {
	$data = ['lower' => $word, 'upper' => strtoupper("$word")];
    return view('uppercase', $data);
});

Route::get('/increment/{number?}', function ($number) {
	$data = ['entered' => $number, 'incremented' => ++$number];
    return view('increment', $data);
});

Route::get('/add/{num1?}/{num2?}', function ($num1, $num2) {
    return $num1 + $num2;
});

Route::get('/rolldice/{guess?}', function($guess) {
	$data = ['diceroll' => mt_rand(1, 6), 'guess' => $guess];
	return view('roll-dice', $data);
});

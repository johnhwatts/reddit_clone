<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function showWelcome()
    {
        return view('welcome');
    }

	public function sayHello($name)
	{
		$data = ['name' => $name];
	    return view('my-first-view', $data);
	}

	public function uppercase($word) {
		$data = ['lower' => $word, 'upper' => strtoupper("$word")];
	    return view('uppercase', $data);
	}

	public function increment($number) {
		$data = ['entered' => $number, 'incremented' => ++$number];
	    return view('increment', $data);
	}
}

<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function showWelcome()
    {
        return redirect()->action('HomeController@sayHello', array('Bob'));
    }

	public function sayHello($name)
	{
		$data = ['name' => $name];
	    return view('my-first-view', $data);
	}
}

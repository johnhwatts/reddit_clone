<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ExampleController extends Controller
{
	public function add($num1, $num2) {
		$data = ['num1' => $num1, 'num2' => $num2];
		return $num1 + $num2;
	}

	public function diceroll($guess) {
		$data = ['diceroll' => mt_rand(1, 6), 'guess' => $guess];
		return view('roll-dice', $data);
	}
}

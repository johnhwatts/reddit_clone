<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Log;
use Session;
use Auth;

class UserController extends Controller
{
	public function __construct(){

		// $this->middleware('auth', ['except' => ['show']]);
	}
    // getting access to the request, is as a easy as adding it as a parameter to any controller
    // action
    public function index(Request $request)
    {

    }

    public function create(Request $request)
    {

    }

    public function store(Request $request)
    {

    }

    public function show(Request $request)
    {
        $user = User::findOrFail(Auth::id());

        return view('users.show', ['user' => $user]);
    }

    public function edit(Request $request)
    {
        $user = User::find(Auth::id());

        if (!$user) {
            Log::info("Cannot edit User.");
			$request->session()->flash('errorMessage', 'User cannot be found');
            abort(404);
        }

        return view('user.edit', ['user' => $user]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = User::$rules;
        $user = User::find($id);
        if (!$user) {
            $request->session()->flash('errorMessage', 'User cannot be found');
            abort(404);
        }

		if($user->email != $request->email) {
			$rules['email'] .= '|unique:users';
		}
		$this->validate($request, $rules);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();
        $request->session()->flash('successMessage', 'User updated successfully');
        return redirect()->action('UserController@show', [$user->id]);
    }
    public function destroy(Request $request, $id)
    {
        $user = User::find($id);
        if (!$user) {
			Log::info("Cannot delete User: $id");
            $request->session()->flash('errorMessage', 'User cannot be found');
            abort(404);
        }
        $user->delete();
        return redirect()->action('PostsController@index');
    }
}

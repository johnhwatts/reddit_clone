<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Log;
use Session;

class PostsController extends Controller
{
	public function __construct(){

		$this->middleware('auth', ['except' => ['index', 'show']]);
	}
    // getting access to the request, is as a easy as adding it as a parameter to any controller
    // action
    public function index(Request $request)
    {
     	if(isset($request->search)) {
			$posts = Post::select('posts.*')
			->join('users', 'created_by', '=', 'users.id')
			->where('title', 'like', "%$request->search%")
			->orwhere('name', 'like', "%$request->search%")
			->orderBy('posts.created_at', 'DESC')
			->paginate(6)->appends(['search' =>$request->search]);
		} else {
			$posts = Post::with('user')->orderBy('posts.created_at', 'DESC')->paginate(6);
		}

        $data = [];
        $data['posts'] = $posts;
        return view('posts.index')->with($data);
    }

    public function create(Request $request)
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
		$rules = Post::$rules;
        $this->validate($request, $rules);
        $post = new Post();
        $post->title = $request->title;
        $post->url = $request->url;
        $post->content = $request->content;
        $post->created_by = $request->id;
        $post->save();

		Log::info("New post saved", $request->all());

        $request->session()->flash('successMessage', 'Post saved successfully');
        return redirect()->action('PostsController@show', [$post->id]);
    }
    public function show(Request $request, $id)
    {
        $post = Post::find($id);

        if (!$post) {
            Log::error("Post with id of $id not found.");
			abort(404);
        }
        $data = [];
        $data['post'] = $post;
        return view('posts.show')->with($data);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $post = Post::find($id);

        if (!$post) {
            Log::error("Post with id of $id not found.");
            abort(404);
        }

		if($post->user->id != \Auth::id()) {
			Session::flash('errorMessage', "Only the post author can edit this post.");
			return redirect()->action('PostsController@index');
		}
        $data = [];
        $data['post'] = $post;

        return view('posts.edit')->with($data);
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
        $rules = Post::$rules;
        $this->validate($request, $rules);
        $post = Post::find($id);
        if (!$post) {
            $request->session()->flash('errorMessage', 'Post cannot be found');
            return redirect()->action('PostsController@index');
        }
        $post->title = $request->title;
        $post->url = $request->url;
        $post->content = $request->content;
        $post->created_by = $request->id;
        $post->save();
        $request->session()->flash('successMessage', 'Post saved successfully');
        return redirect()->action('PostsController@show', [$post->id]);
    }
    public function destroy(Request $request, $id)
    {
        $post = Post::find($id);
        if (!$post) {
            $request->session()->flash('errorMessage', 'Post cannot be found');
            return redirect()->action('PostsController@index');
        }
        $post->delete();
        return view('posts.index');
    }
}

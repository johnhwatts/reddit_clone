<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{
    public function index()
    {
		$posts = \App\Models\Post::all();
		$data['posts'] = $posts;
        return view('posts.index', $data);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $post = new \App\Models\Post();
		$post->title = $request->title;
		$post->content = $request->content;
		$post->url = $request->url;
		$post->save();
		return redirect('posts/index');
    }

    public function show($id)
    {
		$post = \App\Models\Post::find($id);
		return view('posts.show', ['post'=>$post]);
    }

    public function edit($id)
    {
        return view('posts.edit');
    }

    public function update(Request $request, $id)
    {
        return 'Updated post';
    }

    public function destroy($id)
    {
        return 'Deleted post with ID' . $id;
    }
}

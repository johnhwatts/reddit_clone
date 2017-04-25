<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{
    public function index()
    {
        return 'A listing of all posts';
    }

    public function create()
    {
        return 'Show a form for creating a post';
    }

    public function store(Request $request)
    {
        return 'Store the new post';
    }

    public function show($id)
    {
        return 'Show a specific post';
    }

    public function edit($id)
    {
        return 'Show a form for editing a specific post';
    }

    public function update(Request $request, $id)
    {
        return 'Update a specific post';
    }

    public function destroy($id)
    {
        return 'Delete a specific post';
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
class PostsController extends Controller
{

    public function index()
    {
        $posts =  DB::table('posts')->orderBy('created_at', 'DESC')->paginate(10);
        return view('pages.index', ['posts' => $posts]);
    }

    public function create()
    {
        return view('pages.create');
    }

    public function store(CreatePostRequest $request)
    {
        $validated = $request->validated();
        Post::create($validated);
        return redirect()->route('posts.index')
            ->with('success', 'Post created successfully.');
    }
}

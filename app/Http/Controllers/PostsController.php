<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use Illuminate\Http\Request;

class PostsController extends Controller
{
  
    public function index()
    {
        return view('pages.posts');
    }
    
    public function create()
    {
        return view('pages.create');
    }

    public function store(CreatePostRequest $request)
    {
        $validated = $request->validated();

    }
}

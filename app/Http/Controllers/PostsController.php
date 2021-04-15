<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Models\Comment;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Support\Facades\Validator;

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

    public function show(int $id)
    {
        $post =  Post::find($id);
        $comments = Comment::where('post_id', $id)->get();
        
        return view('pages.show', ['post' => $post, 'comments' => $comments]);
    }

    public function vote(Request $request)
    {
        if ($request->ajax()) {
            $data =  Validator::make($request->json()->all(), [
                'id' => 'required'
            ])->validate();
            $id = $data['id'];
            $post = Post::find($id)->increment('votes');
            return  response()
                ->json(['message' => 'Success Message'], 200);
        }
    }
}

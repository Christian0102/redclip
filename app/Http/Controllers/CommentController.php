<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentStoreRequest;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{

    public function store(CommentStoreRequest $request)
    {
        $validated = $request->validated();
        Comment::create($validated);
        return redirect()->back()
            ->with('success', 'Product created successfully.');
    }

    public function vote(Request $request)
    {
        if ($request->ajax()) {
            $data =  Validator::make($request->json()->all(), [
                'id' => 'required'
            ])->validate();
            $id = $data['id'];
            $commnet = Comment::find($id)->increment('votes');
            return  response()
                ->json(['message' => 'Success Message'], 200);
        }
    }
}

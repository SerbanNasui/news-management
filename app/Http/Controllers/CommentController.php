<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'stars' => 'required|integer|between:1,5',
            'body' => 'required|min:5|max:2000',
        ]);

        Comment::create([
            'name' => $request->name,
            'email' => $request->email,
            'stars' => $request->stars,
            'body' => $request->body,
            'article_id' => $request->article_id,
        ]);

        toastr()->success('Your review was sent to processing!');
        return redirect()->back();
    }
}

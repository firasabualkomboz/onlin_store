<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request){

        $this->validate($request,[
            'message' => 'required',
        ]);

        $comment = Comment::create([
            'message' => $request->message,
        ]);

        $comment->save();


    }
}

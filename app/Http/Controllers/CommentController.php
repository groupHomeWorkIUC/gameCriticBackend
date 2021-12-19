<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        try {
            $comment = new Comment();
            $comment->content = $request->name;
            $comment->content = $request->content;
            $comment->rating = $request->rating;
            $comment->user_id = $request->user_id;
            $comment->save();
            return "Comment created";
        } catch (\Exception $exception) {
            return $exception;
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }




}

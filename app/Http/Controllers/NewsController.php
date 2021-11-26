<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{

    public function index()
    {
        $news = News::with('images','comments','reactions')->get();
        return $news;
    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        try {
            $news = new News();
            $news->title = $request->title;
            $news->content = $request->content;
            $news->view_count = 0;
            $news->save();
            return "News created";
        } catch (\Exception $exception) {
            return $exception;
        }

    }

    public function show($id)
    {
        $new = News::where('id',$id)->with('images','comments','reactions')->get();
        return $new;
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

<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\ImageNews;
use Illuminate\Http\Request;
use App\Models\News;
use Psy\Util\Str;

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

    public function createNews(Request $request)
    {
        $checkNews=News::where('slug',\Illuminate\Support\Str::slug($request->title))->first();
        if(!$checkNews){
            $news=new News();
            $news->title=$request->title;
            $news->content=$request->content;
            $news->view_count=0;
            $news->slug=\Illuminate\Support\Str::slug($request->title);
            $news->save();

            foreach($request->news_images as $image_item){
                $image=new Image();
                $image->link=$image_item;
                $image->save();

                $imageNews= new ImageNews();
                $imageNews->image_id=$image->id;
                $imageNews->news_id=$news->id;
                $imageNews->save();
            }
            return "News created !";
        }
        else{
           return "News exists !";
        }

    }
}

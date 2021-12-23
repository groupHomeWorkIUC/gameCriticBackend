<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\CommentNews;
use App\Models\Image;
use App\Models\ImageNews;
use App\Models\IpNews;
use App\Models\NewsReaction;
use Illuminate\Http\Request;
use App\Models\News;
use Psy\Util\Str;
use Symfony\Component\Mime\Encoder\Rfc2231Encoder;

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

    public function show(Request  $request,$id)
    {
        $seen=IpNews::where('ip',$request->ip())->where('news_id',$id)->first();
        $news = News::where('id',$id)->with('images','comments.user','reactions')->first();

        if(!$seen){
            $ip_news=new IpNews();
            $ip_news->ip=$request->ip();
            $ip_news->news_id=$id;
            $ip_news->save();
            $news->view_count+=1;
            $news->save();
        }

        return $news;
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

    public function createNewsComment(Request $request){

        $comment=new Comment();
        $comment->content=$request->content;
        $comment->rating=1;
        $comment->user_id=$request->user_id;
        $comment->save();

        $commentNews=new CommentNews();
        $commentNews->comment_id=$comment->id;
        $commentNews->news_id=$request->news_id;
        $commentNews->save();

        if($comment && $commentNews){
            return ["message"=>"success"];
        }
        else{
            return ["message"=>"error"];
        }

    }

    public function crwdeateNewsReactions(Request $request){

        $exist_reactions=NewsReaction::where('news_id',$request->news_id)->where('user_id',$request->user_id)->first();

        if(!$exist_reactions){
            $news_reactions=new NewsReaction();
            $news_reactions->sad=0;
            $news_reactions->happy=0;
            $news_reactions->calm=0;
            $news_reactions->funny=0;
            $news_reactions->news_id=$request->news_id;
            $news_reactions->save();

            if($request->sad && $request->sad==1){
                $news_reactions->sad+=1;
            }
            if($request->hot && $request->hot==1){
                $news_reactions->hot+=1;
            }
            if($request->happy && $request->happy==1){
                $news_reactions->happy+1;
            }
            if($request->calm && $request->calm==1){
                $news_reactions->calm+=1;
            }
            if($request->funny && $request->funny==1){
                $news_reactions->funny+=1;
            }

            $news_reactions->save();

        }

        else{
            if($request->sad && $request->sad==1){
                $exist_reactions->sad+=1;
            }
            if($request->hot && $request->hot==1){
                $exist_reactions->hot+=1;
            }
            if($request->happy && $request->happy==1){
                $exist_reactions->happy+1;
            }
            if($request->calm && $request->calm==1){
                $exist_reactions->calm+=1;
            }
            if($request->funny && $request->funny){
                $exist_reactions->funny+=1;
            }

            $exist_reactions->save();
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Company;
use App\Models\CompanyGame;
use App\Models\GameImage;
use App\Models\GamePlatform;
use App\Models\GameRating;
use App\Models\Image;
use App\Models\Platform;
use App\Models\Store;
use App\Models\StoreGame;
use Facade\FlareClient\Api;
use Illuminate\Http\Request;
use App\Models\Game;
use Illuminate\Support\Str;


class GameController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth:api', ['except' => ['login']]);
    }

    public function index(Request $request)
    {
        //resim
        $games = Game::with('images');
        if($request->company_id && $request->company_id!=''){
            $games->where('company_id',$request->company_id);
        }
        if($request->name && $request->name!="") 
        { 
            $games->where("name","like","%".$request->name."%")
        }
        $games=$games->get();
        return $games;
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        try {
            $game = new Game();
            $game->name = $request->name;
            $game->content = $request->content;
            $game->save();
            return "Game created";
        } catch (\Exception $exception) {
            return $exception;
        }
    }

    public function show($id)
    {
        $game=Game::where('id',$id)->with('images','platforms','company')->first();
        $game->rating=12;
        return $game;
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

    public function createGame(Request $request){
        $checkGame=Game::where('slug',Str::slug($request->name))->first();
        if(!$checkGame){

            $checkCompany=$request->company_id;

            if($checkCompany !=""){
                $company=Company::where('id',$checkCompany)->first();
                $game=new Game();
                $game->name=$request->name;
                $game->content=$request->content;
                $game->tags=$request->tags;
                $game->slug=Str::slug($request->name);
                $game->release_date=$request->release_date;
                $game->company_id=$company->id;
                $game->save();

               foreach($request->platforms as $platform){
                $gamePlatform=new GamePlatform();
                $gamePlatform->game_id=$game->id;
                $gamePlatform->platform_id=$platform;
                $gamePlatform->save();
               }


                foreach($request->stores as $store){
                        $store_game=new StoreGame();
                        $store_game->game_id=$game->id;
                        $store_game->store_id=$store;
                        $store_game->save();
                }


                foreach($request->game_images as $game_image){

                    $checkImage=Image::where('link',$game_image)->first();

                    if(!$checkImage){
                        $image=new Image();
                        $image->link=$game_image;
                        $image->save();

                        $game_image=new GameImage();
                        $game_image->game_id=$game->id;
                        $game_image->image_id=$image->id;
                        $game_image->save();
                    }
                    else{
                        $game_image=new GameImage();
                        $game_image->image_id=$checkImage->id;
                        $game_image->game_id=$game->id;
                        $game_image->save();
                    }
                }
                return "Game created";
        }
            else{

                $companyExists=Company::where('slug',Str::slug($request->company_name))->first();

                if($companyExists){
                    return "Company exists !";
                }
                else{

                    $company=new Company();
                    $company->name=$request->company_name;
                    $company->content=$request->company_content;
                    $company->slug=Str::slug($request->company_name);
                    $company->save();

                    $game=new Game();
                    $game->name=$request->name;
                    $game->content=$request->content;
                    $game->tags=$request->tags;
                    $game->slug=Str::slug($request->name);
                    $game->release_date=$request->release_date;
                    $game->company_id=$company->id;
                    $game->save();


                    foreach($request->platforms as $platform){
                        $gamePlatform=new GamePlatform();
                        $gamePlatform->game_id=$game->id;
                        $gamePlatform->platform_id=$platform;
                        $gamePlatform->save();
                    }

                    foreach($request->stores as $store){
                        $store_game=new StoreGame();
                        $store_game->game_id=$game->id;
                        $store_game->store_id=$store;
                        $store_game->save();
                    }


                    foreach($request->game_images as $game_image){
                        $checkImage=Image::where('link',$game_image)->first();

                        if(!$checkImage){
                            $image=new Image();
                            $image->link=$game_image;
                            $image->save();

                            $game_image=new GameImage();
                            $game_image->game_id=$game->id;
                            $game_image->image_id=$image->id;
                            $game_image->save();
                        }
                        else{
                            $game_image=new GameImage();
                            $game_image->image_id=$checkImage->id;
                            $game_image->game_id=$game->id;
                            $game_image->save();
                        }


                    }
                    return "Game Created";
                }
            }
                }


        else{
            return "Game exists !";
        }
        }



    public function createCommentRating(Request $request){


        $exist=GameRating::where('user_id',$request->user_id)->where('game_id',$request->game_id)->first();

        if(!$exist){
    $gameRating=new \GameRating();
    $gameRating->content=$request->content;
    $gameRating->gameplay=$request->gameplay;
    $gameRating->narrative=$request->narrative;
    $gameRating->graphics=$request->graphics;
    $gameRating->technical=$request->technical;
    $gameRating->audio_design=$request->audio_design;
    $gameRating->user_id=$request->user_id;
    $gameRating->game_id=$request->game_id;
    $gameRating->save();
        }



    }
}

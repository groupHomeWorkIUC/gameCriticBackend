<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Company;
use App\Models\CompanyGame;
use App\Models\GameImage;
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

    public function index()
    {
        //resim
        $games = Game::all();
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

    public function createGame(Request $request){

        $checkGame=Game::where('slug',Str::slug($request->name))->first();
        if(!$checkGame){

            $game=new Game();
            $game->name=$request->name;
            $game->content=$request->content;
            $game->tags=$request->tags;
            $game->slug=Str::slug($request->name);
            $game->release_date=$request->release_date;
            $game->save();

            $platforms=new Platform();
            $platforms->game_id=$game->id;
            $platforms->pc=$request->pc;
            $platforms->playstation=$request->playstation;
            $platforms->xbox=$request->xbox;
            $platforms->nintendo=$request->nintendo;
            $platforms->android=$request->android;
            $platforms->ios=$request->ios;
            $platforms->stadia=$request->stadia;
            $platforms->save();



            $checkCompany=Company::where('name',$request->company_name)->first();

            if(!$checkCompany){
                $company=new Company();
                $company->name=$request->company_name;
                $company->content=$request->company_content;
                $company->slug=Str::slug($request->company_name);
                $company->save();

                $company_game=new CompanyGame();
                $company_game->company_id=$company->id;
                $company_game->game_id=$game->id;
                $company_game->save();
            }
            else{
                $company_game=new CompanyGame();
                $company_game->game_id=$game->id;
                $company_game->company_id=$checkCompany->id;
                $company_game->save();
            }

            $checkStore=Store::where('name',$request->store_name)->first();
            if(!$checkStore){
                $store=new Store();
                $store->name=$request->store_name;
                $store->image_link=$request->image_link;
                $store->save();

                $store_game=new StoreGame();
                $store_game->game_id=$game->id;
                $store_game->store_id=$store->id;
                $store_game->save();
            }
            else{
                $store_game=new StoreGame();
                $store_game->game_id=$game->id;
                $store_game->store_id=$checkStore->id;
                $store_game->save();
            }

            /*foreach($request->category as $category){
                $checkCategory=Category::where('name',$category)->first();

                if(!$checkCategory){
                    $category=new Category();

                }
             */

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
        }
        else{
            return "Game exists !";
        }
        }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;


class GameController extends Controller
{
    public function index()
    {
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
}

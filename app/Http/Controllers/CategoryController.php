<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;


class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        return $categories;
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        try {
            $checkCategory=Category::where('slug',Str::slug($request->name))->first();
            if(!$checkCategory){
                $category = new Category();
                $category->name = $request->name;
                $category->content = $request->content;
                $category->slug=Str::slug($request->name);
                $category->save();
                return "Category created";
            }
            else{
                return "Category exists !";
            }

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

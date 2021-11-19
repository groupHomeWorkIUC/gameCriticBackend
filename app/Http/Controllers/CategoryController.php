<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;


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
            $category = new Category();
            $category->name = $request->name;
            $category->content = $request->content;
            $category->save();
            return "Category created";
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

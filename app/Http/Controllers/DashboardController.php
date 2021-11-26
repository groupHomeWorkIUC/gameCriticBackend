<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Platform;
use App\Models\Store;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stores=Store::get();
        $companies=Company::orderBy('name')->get();
        $platforms=Platform::get();
        return view('dashboard')->with('stores',$stores)->with('companies',$companies)->with('platforms',$platforms);
    }
}

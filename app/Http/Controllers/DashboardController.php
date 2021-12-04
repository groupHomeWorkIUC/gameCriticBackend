<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Platform;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redirect;

class DashboardController extends Controller
{



    public function createGamePage()
    {
        if(Cache::get('user')){
            $stores=Store::get();
            $companies=Company::orderBy('name')->get();
            $platforms=Platform::get();
            return view('dashboard')->with('stores',$stores)->with('companies',$companies)->with('platforms',$platforms);
        }
        else{
        return \redirect()->route('login-get');
        }

    }

    public function login(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (auth()->attempt($credentials)) {
            $request->session()->regenerate();
            $this->user_login=auth()->user();
            \Illuminate\Support\Facades\Cache::put('user',$this->user_login);
            return redirect('/');
        }


        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
        return redirect('/login-page');
    }
    public function loginPage(){

     return view('admin_login');
    }

    public function createNewsPage(){
        if(Cache::get('user')) {

            return view('news');
        }
        else{
            return \redirect()->route('login-get');
        }
    }

}

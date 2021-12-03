<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{

    public function __construct()
    {
       $this->middleware('auth:api', ['except' => ['login']]);
    }

    public function index(){

    }

    public function loginPage(){
        return "Giriş yapınız";
    }

    public function login()
    {
        $credentials = request(['email', 'password']);

        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }


    public function me()
    {
        return response()->json(auth()->user());
    }


    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }


    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }


    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }

    public function register(Request $request)
    {
        $userExists=User::where('email',$request->email)->first();
        if($userExists){
            return ["success"=>false, "message"=>"This email is already registered."];
        }
        $userExists=User::where('email',$request->email)->first();
        if($userExists){
            return ["succes"=>false, "message"=>"This username is taken"];
        }
        $user=new User();
        $user->email=$request->email;
        $user->password=password_hash($request->password,PASSWORD_DEFAULT);
        $user->name=$request->name;
        $user->username=$request->username;
        $user->save();


        if($user){
            $credentials = request(['email', 'password']);
            if (! $token = auth()->attempt($credentials)) {
                return response()->json(['error' => 'Unauthorized'], 401);
            }

            return $this->respondWithToken($token);
        }
        else{
           return ["success"=>true,"message"=>"An error occured while creating user"];
        }
    }

}

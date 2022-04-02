<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view("login");
    }

    public function doLogin(Request $request)
    {
        $credentials = [
            "email" => $request->email,
            "password" => $request->password,
        ];
        $auth = Auth::guard('web')->attempt($credentials);

        if($auth)
        {
            return redirect()->route('welcome');
        }
        else{
            return redirect()->route('login');
        }
    }

    public function doLogout()
    {
        Auth::guard('web')->logout();

        return redirect()->route('login');
    }

}

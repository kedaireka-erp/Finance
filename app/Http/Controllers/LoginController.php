<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index () {
        Auth::loginUsingId(1);

        return redirect("/");
        // return redirect("http://erp.alluresystem.site");
    }

    public function login (Request $request) {
        // Auth::loginUsingId(base64_decode($request->user_id));

        // return redirect("/");
    }

    public function logout () {
        Auth::logout();
        return redirect("http://erp.alluresystem.site");
    }
}
<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{

    public function showSignInForm()
    {
        $title = 'User Sign In';
        return view('user.auth.signin', ['title'=> $title]);
    }


    public function showSignUpForm()
    {
        $title = 'Admin Sign Up';
        return view('user.auth.signup', ['title'=> $title]);
    }
}

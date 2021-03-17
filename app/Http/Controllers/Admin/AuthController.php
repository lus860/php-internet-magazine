<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{

    public function __construct()
    {
        $this->middleware('web');
        $this->middleware('NotAdmin');

    }

    public function showLoginForm()
    {
        $title = 'Admin Login';
        return view('admin.auth.login', ['title'=>$title]);
    }
}

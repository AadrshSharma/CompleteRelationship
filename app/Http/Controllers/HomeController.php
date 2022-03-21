<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class HomeController extends Controller
{
    //
    public function view(){
        return Inertia::render('view');
    }
    public function login(){
        return Inertia::render('newlogin');
    }
    public function register(){
        return Inertia::render('register');
    }
    public function home(){
        return Inertia::render('home');
    }
    public function parent(){
        return Inertia::render('Parent');
    }
    public function index(){
        $role = Auth::user()->role;
        if($role==1)
        {
            return Inertia::render('home');
        }
        else
        {
            return Inertia::render('dashboard');
        }
    }
}

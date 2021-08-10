<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function docs()
    {
        return view('docs');
    }
    public function todo()
    {
        return view('todo');
    }
}

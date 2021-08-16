<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

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

    public function todos()
    {
        return view('todo');
    }
}

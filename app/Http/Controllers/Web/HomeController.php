<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view('docs.home');
    }

    public function todos()
    {
        return view('docs.todo');
    }

    function authentication()
    {
        return view('docs.authentication');
    }

    function blog()
    {
        return view('docs.blog');
    }
}

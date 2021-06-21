<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        return response()->json(['success' => "Welcome to 'TalkToAPI'. It's a free app and open source where you can test api with your local development project. And also get real life API project experience."]);
    }
}

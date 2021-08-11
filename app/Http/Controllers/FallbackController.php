<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FallbackController extends Controller
{
    public function index(Request $request)
    {
        if ($request->is('api/*')) {
            return talkToApiResponse([], 'Data Not Found!', 404, false);
        }
        return view('errors.404');
    }
}

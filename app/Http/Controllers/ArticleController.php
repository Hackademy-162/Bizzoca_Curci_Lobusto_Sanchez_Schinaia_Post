<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ArticleController;

class ArticleController extends Controller
{
    public function homepage()
    {
        return view('homepage');
    }

    
}

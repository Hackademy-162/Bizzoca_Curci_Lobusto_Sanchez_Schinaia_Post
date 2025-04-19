<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ArticleController;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class ArticleController extends Controller implements HasMiddleware


{
    public function homepage()
    {
        return view('welcome');
    }

    public function create()
    {
        return view('article.create');
    }

    public function store(Request $request)

    {
        $request->validate([
            'title'    => 'required|unique:articles|min:5',
            'subtitle' => 'required|min:5',
            'body'     => 'required|min:10',
            'image'    => 'required|image',
            'category' => 'required',
        ]);
    
        $article = Article::create([
            'title'      => $request->title,
            'subtitle'   => $request->subtitle,
            'body'       => $request->body,
            'image'      => $request->file('image')->store('images', 'public'),
            'category_id'=> $request->category,
            'user_id'    => Auth::user()->id,
        ]);
    
        return redirect(route('homepage'))->with('message', 'Articolo creato con successo');
    }

    public static function middleware()
    {
        return [new Middleware ('auth', except: ['index', 'show']),
    ];
    
    }

    
}

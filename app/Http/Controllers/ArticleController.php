<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ArticleController;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class ArticleController extends Controller implements HasMiddleware


{
   

    public function create()
    {
        return view('article.create');
    }

    public function store(Request $request)

    

    {
        // dd($request->all());
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
        return [new Middleware ('auth', except: ['index', 'show', 'byCategory', 'byUser']),
    ];
    
    }

    public function index()
    {   
        $articles = Article::orderBy('created_at', 'desc')->get();
        return view('article.index', compact('articles'));

    }

    public function show(Article $article)
    {
        return view('article.show', compact('article'));
    }

    public function byCategory(Category $category)
    {
        $articles = $category->articles()->orderBy('created_at', 'desc')->get();
        return view('article.by-category', compact('category', 'articles'));
    }

    public function byUser(User $user)
    {
        $articles = $user->articles()->orderBy('created_at', 'desc')->get();
        return view('article.by-user', compact('user', 'articles'));
    }

    
}

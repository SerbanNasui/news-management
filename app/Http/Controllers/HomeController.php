<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $articles = Article::where('published', 1)->get();
        return view('home', compact('articles'));
    }
}

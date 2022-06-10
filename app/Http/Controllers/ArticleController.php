<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ArticleController extends Controller
{

    public function index(){
        $articles = Article::listArticlesInBackoffice()->get();
        return view('back-office.articles.index', compact('articles'));
    }

    public function create(){
        return view('back-office.articles.create');
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required|min:3',
            'body' => 'required|min:3',
        ]);

        $author = auth()->user()->id;
        Article::create([
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => $author,
            'slug' => strtolower(str_replace(' ', '-', $request->title)).'-'.$author.'-'.Carbon::now()->timestamp,
        ]);

        toastr()->success('Article created successfully');
        return redirect()->route('news.index');
    }
}

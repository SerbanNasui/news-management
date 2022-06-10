<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Services\UploadImageService;
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
            'thumbnail' => 'image|mimes:jpeg,png,jpg,gif,svg|max:20000|dimensions:min_width=10,min_height=10',
        ]);

        $author = auth()->user();
        $slug = strtolower(str_replace(' ', '-', $request->title)).'-'.$author->id.'-'.Carbon::now()->timestamp;
        $imageName = (new UploadImageService())->uploadThumbnail($request, $author, $slug);

        Article::create([
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => $author->id,
            'slug' => $slug,
            'thumbnail' => $imageName
        ]);

        toastr()->success('Article created successfully');
        return redirect()->route('news.index');
    }
}

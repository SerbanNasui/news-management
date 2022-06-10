<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
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
        $categories = Category::all();
        return view('back-office.articles.create', compact('categories'));
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required|min:3',
            'body' => 'required|min:3',
            'thumbnail' => 'image|mimes:jpeg,png,jpg,gif,svg|max:20000|dimensions:min_width=10,min_height=10',
            'category_id' => 'required|exists:categories,id',
        ]);

        $author = auth()->user();
        $slug = strtolower(str_replace(' ', '-', $request->title)).'-'.$author->id.'-'.Carbon::now()->timestamp;
        if($request->hasFile('thumbnail')) {
            $imageName = (new UploadImageService())->uploadThumbnail($request, $slug, $author);
        }else{
            $imageName = null;
        }

        Article::create([
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => $author->id,
            'slug' => $slug,
            'thumbnail' => $imageName,
            'category_id' => $request->category_id,
        ]);

        toastr()->success('Article created successfully');
        return redirect()->route('news.index');
    }

    public function show($id){
        $article = Article::findOrFail($id);
        $categories = Category::all();
        return view('back-office.articles.show', compact('article', 'categories'));
    }

    public function update(Request $request, $id){
        $article = Article::findOrFail($id);
        $request->validate([
            'title' => 'required|min:3',
            'body' => 'required|min:3',
            'thumbnail' => 'image|mimes:jpeg,png,jpg,gif,svg|max:20000|dimensions:min_width=10,min_height=10',
            'category_id' => 'required|exists:categories,id',
        ]);

        $author = auth()->user();
        $slug = strtolower(str_replace(' ', '-', $request->title)).'-'.$author->id.'-'.Carbon::now()->timestamp;
        if($request->hasFile('thumbnail')) {
            $imageName = (new UploadImageService())->uploadThumbnail($request, $slug, $author);
        }else{
            $imageName = $article->thumbnail;
        }

        $article->update([
            'title' => $request->title,
            'body' => $request->body,
            'slug' => $slug,
            'thumbnail' => $imageName,
            'category_id' => $request->category_id,
            'published' => 0
        ]);

        toastr()->success('Article updated successfully');
        return redirect()->route('news.index');
    }

    public function destroy($id){
        $article = Article::findOrFail($id);
        $article->delete();
        toastr()->success('Article deleted successfully');
        return redirect()->route('news.index');
    }
}

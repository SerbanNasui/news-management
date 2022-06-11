<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index(){
        $categories = Category::all();
        $users = User::writesAndPublishers()->get();
        return view('client.home', compact('categories', 'users'));
    }

    public function showArticlesFromCategory($id){
        $category = Category::find($id);
        $articles = Article::articlesInFrontend()->with('articleViews')->where('category_id', $id)->get();
        return view('client.articles', compact('articles', 'category'));
    }

    public function displayArticle($id){
        $article = Article::isPublished($id);
        return view('client.article', compact('article'));
    }
}

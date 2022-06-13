<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use App\Models\Weather;
use App\Services\WeatherApiService;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index(){
        $categories = Category::all();
        $users = User::writesAndPublishers()->get();
        $articles = Article::articlesInFrontend()->highlighted()->get();
        $weather = Weather::inRandomOrder()->get();
        return view('client.home', compact('categories', 'users', 'articles', 'weather'));
    }

    public function showArticlesFromCategory($id){
        $category = Category::find($id);
        $articles = Article::articlesInFrontend()->with('articleViews')->where('category_id', $id)->paginate(6);
        return view('client.articles', compact('articles', 'category'));
    }

    public function displayArticle($id){
        $article = Article::isPublished($id);
        $comments = $article->comments()->approved()->paginate(10);
        return view('client.article', compact('article', 'comments'));
    }

    public function displayWeather(){
        $weather = (new WeatherApiService())->getWeather();
        return response()->json($weather);
    }
}

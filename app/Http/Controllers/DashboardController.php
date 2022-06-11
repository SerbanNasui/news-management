<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleView;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index(){

        return view('back-office.index');
    }

    public function ajaxDashboardLoader(){

        $user = auth()->user();
        $usersCount = User::count();

        if($user->isAdminAndPublisher()) {
            $articles = Article::all();
            $articlesCount = $articles->count();
        }else{
            $articles = Article::where('user_id', $user->id)->get();
            $articlesCount = $articles->count();
        }

        $categoriesCount = Category::count();
        $publishedCount = Article::where('published', 1)->count();

        $articles->map(function ($article) {
            $article->views = ArticleView::where('article_id', $article->id)->count();
            return $article;
        });

        $mostPopularArticles = ($articles->pluck('views', 'title')->toArray());

        return response()->json(compact('usersCount', 'articlesCount', 'categoriesCount', 'publishedCount', 'mostPopularArticles'));
    }
}

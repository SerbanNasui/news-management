<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ManageNewsController extends Controller
{

    public function index(){

        $articles = Article::orderBy('published', 'asc')->get();
        $writer = Session::get('writer');
        if($writer){
            $articles = Article::where('user_id', $writer)->orderBy('published', 'asc')->get();
        }

        $writers = User::writers()->get();
        return view('back-office.manage-news.index', compact('articles', 'writers'));
    }

    public function publishArticle(Request $request){
        $article = Article::findOrFail($request->id);
        $article->published = $request->publish;
        $article->save();
    }

    public function filterByWriter(Request $request){
        if($request->writer == 'all'){
            Session::forget('writer');
            toastr()->success('All news are now visible');
            return redirect()->route('manage.news.index');

        }
        $writer = User::findOrFail($request->writer);
        Session::put('writer', $request->writer);
        toastr()->success('News are now visible only for '.$writer->name);
        return redirect()->route('manage.news.index');
    }
}
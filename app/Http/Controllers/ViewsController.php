<?php

namespace App\Http\Controllers;

use App\Models\ArticleView;
use Illuminate\Http\Request;

class ViewsController extends Controller
{
    public function incrementViews($id){
        if(request()->ajax() == true){
            ArticleView::create([
                'article_id' => $id,
                'ip' => request()->ip()
            ]);
        }
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'thumbnail',
        'body',
        'published',
        'slug',
        'category_id',
        'short_description'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function articleView(){
        return $this->belongs(ArticleView::class);
    }

    public function scopeListArticlesInBackoffice($query){
        if(auth()->user()->hasRole('admin')){
            return $query->orderBy('created_at', 'asc');
        }else{
            return $query->where('user_id', auth()->user()->id)->orderBy('created_at', 'asc');
        }
    }

    public function scopeArticlesInFrontend($query){
        return $query->where('published', 1);
    }

    public function isPublished($id){
        $article = Article::find($id);
        if($article->published == 0)abort(404);
        return $article;
    }
}

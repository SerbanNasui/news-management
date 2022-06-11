<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleView extends Model
{
    use HasFactory;

    protected $fillable = [
        'article_id',
        'is_viewed',
        'location',
    ];

    protected $table = 'article_views';

    public function article(){
        return $this->belongsTo(Article::class);
    }
}

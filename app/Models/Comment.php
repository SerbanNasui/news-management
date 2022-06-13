<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'article_id',
        'stars',
        'name',
        'email',
        'body',
        'approved',
    ];

    public function article(){
        return $this->belongsTo(Article::class);
    }

    public function scopeApproved($query){
        return $query->where('approved', 1);
    }
}

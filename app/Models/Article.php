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
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function scopeListArticlesInBackoffice($query){
        if(auth()->user()->hasRole('admin')){
            return $query->orderBy('created_at', 'asc');
        }else{
            return $query->where('user_id', auth()->user()->id)->orderBy('created_at', 'asc');
        }
    }
}

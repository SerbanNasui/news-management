<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function articles(){
        return $this->hasMany(Article::class);
    }

    public function profile(){
        return $this->hasOne(UserProfile::class);
    }

    public function isAdmin(){
        return $this->hasRole('admin');
    }

    public function scopeWriter($query){
        return $query->whereHas('roles', function($q){
            $q->where('name', 'writer');
        });
    }

    public function scopeWriters($query){
        return $query->whereHas('roles', function($q){
            $q->where('name', 'writer')->orWhere('name', 'admin');
        });
    }

    public function isAdminAndPublisher(){
        if($this->hasRole('admin') || $this->hasRole('publisher')){
            return true;
        }
        return false;
    }

    public function scopeWritesAndPublishers($query){
        return $query->whereHas('roles', function($q){
            $q->where('name', 'writer')->orWhere('name', 'publisher');
        });
    }
}

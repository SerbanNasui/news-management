<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'phone',
        'address',
        'city',
        'state',
        'zip',
        'country',
        'avatar',
        'facebook',
        'instagram',
        'twitter',
        'linkedin',
    ];

    protected $table = 'user_profile';

    public function user(){
        return $this->belongsTo(User::class);
    }
}

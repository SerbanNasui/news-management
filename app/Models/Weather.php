<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Weather extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'city',
        'aqi',
        'info_data'
    ];

    protected $table = 'weather';
}

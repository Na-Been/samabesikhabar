<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Advertisement extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'advertisements';

    protected $fillable = [
        'title',
        'image',
        'url',
        'rank',
        'status',
        'page',
        'starting_date',
        'ending_date',
        'display_at',
        'no_of_views'
    ];

    public function getAdsImageAttribute()
    {
        return asset(url('/') . Storage::url($this->image));
    }
}

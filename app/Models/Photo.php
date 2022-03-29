<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Photo extends Model
{
    use HasFactory;

    protected $table = 'photos';
    protected $fillable = [
        'description', 'image', 'status'
    ];

   /* public function getPhotoImageFeature()
    {
        return url('/') . Storage::url($this->image);
    }*/
}

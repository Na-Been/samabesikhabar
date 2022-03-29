<?php

namespace App\Models;

use Cohensive\Embed\Facades\Embed;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Live extends Model
{
    use HasFactory;

    protected $table = 'lives';
    protected $fillable = [
        'title', 'url', 'status'
    ];

    public function getLiveLinkAttribute()
    {
        $embed = Embed::make($this->url)->parseUrl();

        if (!$embed)
            return '';

        $embed->setAttribute(['width' => 300]);
        return $embed->getHtml();
    }
}

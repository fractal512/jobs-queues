<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    use HasFactory;

    protected $fillable
        = [
            'title',
            'slug',
            'category_id',
            'user_id',
            'excerpt',
            'content_raw',
            'is_published',
            'published_at',
        ];
}

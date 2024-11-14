<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Article extends Model
{
    /** @use HasFactory<\Database\Factories\ArticleFactory> */
    use HasFactory;

    protected $casts = [
        'published_at' => 'datetime',
    ];

    // Relationships

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    // Model methods

    public function summary(int $length = 50): string
    {
        return Str::of($this->content)->limit($length);
    }
}

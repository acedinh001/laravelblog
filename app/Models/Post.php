<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;
use PharIo\Manifest\Author;

class Post extends Model
{
    use HasFactory;

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function excerpt()
    {
        return Str::limit(strip_tags($this->body), 100);
    }

    public function readTime()
    {
        $wordPerMinute = 250;
        $wordCount = str_word_count(strip_tags($this->body));
        $readTime = round($wordCount / $wordPerMinute);
        return max($readTime, 1);
    }

    public function scopePublished($query)
    {
        return $query->where('published_at', '<=', Carbon::now());
    }
    public function scopeFeatured($query) {
        return $query->where('featured', true);
    }
    protected $casts = [
        'published_at' => 'datetime',
    ];
}

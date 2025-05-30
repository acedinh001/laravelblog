<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use PharIo\Manifest\Author;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'image',
        'slug', 'user_id', 'body', 'published_at', 'featured'
    ];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    public function likes()
    {
        return $this->belongsToMany(User::class, 'like_post')
            ->withTimestamps();
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function hasLiked()
    {
        return $this->likes()->where('user_id', Auth::id())->exists();
    }
    public function excerpt()
    {
        return Str::limit(strip_tags($this->body), 100);
    }

    public function getImageUrl()
    {
        $isUrl = str_contains($this->image, 'http');
        return $isUrl ? $this->image : Storage::url($this->image);
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

    public function scopeWithCategory($query, $category)
    {
        if (!$category) {
            return null;
        }
        return $query->whereHas('categories', function ($query) use ($category) {
            $query->where('slug', 'like', '%' . $category . '%');
        });
    }

    public function scopePopular($query)
    {
        return  $query->withCount('likes')
            ->orderBy('likes_count', 'desc');
    }

    protected $casts = [
        'published_at' => 'datetime',
    ];
}

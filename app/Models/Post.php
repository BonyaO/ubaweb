<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ["user_id", "title", "image", "slug", "summary", "detail", "is_published", "category_id"];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class, "taggable");
    }

    public function url(): string
    {
        return "/blog/{$this->id}/{$this->slug}";
    }

    public function tagString(): string
    {
        return $this->tags()->pluck('name')->implode(', ');
    }
}

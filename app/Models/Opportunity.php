<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Opportunity extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'type',
        'status',
        'summary',
        'detail',
        'website',
        'image',
        'deadline',
        'is_published',
    ];

    protected $casts = [
        'deadline' => 'date',
        'is_published' => 'boolean',
    ];

    public function isOpen(): bool
    {
        return $this->status === 'open';
    }

    public function imageUrl(): ?string
    {
        return $this->image ? '/storage/'.$this->image : null;
    }

    public function ctaUrl(): string
    {
        return $this->website ?: route('contact');
    }

    public function detailUrl(): string
    {
        return "/opportunities/{$this->id}/".Str::slug($this->title);
    }
}

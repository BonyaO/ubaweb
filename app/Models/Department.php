<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Department extends Model
{
    use HasFactory;

    protected $fillable = ['school_id', 'name', 'description', 'website'];

    public function school(): BelongsTo
    {
        return $this->belongsTo(School::class);
    }
    public function programmes(): HasMany
    {
        return $this->hasMany(Programme::class);
    }

    public function departmentUrl()
    {
        return "/departments/{$this->school->name}/{$this->id}/" . Str::slug($this->name);
    }
}

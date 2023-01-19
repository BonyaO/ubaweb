<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class School extends Model
{
    use HasFactory;

    protected $fillable = ["logo", "image", "name", "short_name", "mission_statement", "website", "description", "is_school"];

    public function departments(): HasMany
    {
        return $this->hasMany(Department::class);
    }
}

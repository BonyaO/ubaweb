<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Programme extends Model
{
    use HasFactory;

    protected $fillable = ['department_id', 'name', 'short_name', 'description', 'duration', 'prerequisite', 'fee', 'show_fee'];

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }
}

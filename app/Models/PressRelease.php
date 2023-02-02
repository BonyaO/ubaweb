<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PressRelease extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'signed_on', 'file', 'image', 'description', 'is_published'];

    protected $casts = [
        'signed_on' => 'datetime'
    ];

    public function downloadUrl(): string
    {
        return "/storage/" . $this->file; 
    }
}

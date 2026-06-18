<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'image', 'nickname', 'position', 'address', 'email', 'telephone', 'gender', 'dob', 'about'];

    public function imageUrl(): ?string
    {
        return $this->image ? '/storage/'.$this->image : null;
    }
}

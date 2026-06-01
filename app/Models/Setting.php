<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    public $fillable = ['key', 'display_name', 'type', 'group', 'value'];
    public $timestamps = false;
}

<?php

use App\Models\Setting;

function setting($key)
{
    $result = Setting::where('key', $key)->first()->value ?? "no content";
    return $result;
}

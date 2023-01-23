<?php

use IbrahimBedir\FilamentDynamicSettingsPage\Models\Setting;

function setting($key)
{
    $result = Setting::where('key', $key)->first()->value;
    // dd($result);
    return $result;
}

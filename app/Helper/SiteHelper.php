<?php

namespace App\Helper;

class SiteHelper
{
    public static function slug(string $title)
    {
        $slug = trim($title);
        $slug = preg_replace("/[^a-zA-Z0-9 -]/", '', $slug);
        $slug = str_replace(' ', '-', $slug);
        $slug = strtolower($slug);

        return $slug;
    }
}

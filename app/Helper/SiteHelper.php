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

    public static function shorterText(string $text, int $char_limit): string
    {
        if (strlen($text) > $char_limit) {

            $new_text = substr($text, 0, $char_limit);
            $new_text = trim($new_text);

            return $new_text . "....";
        } else {
            return $text;
        }
    }

    static function time_elapsed_A($secs)
    {
        $bit = array(
            'y' => $secs / 31556926 % 12,
            'w' => $secs / 604800 % 52,
            'd' => $secs / 86400 % 7,
            'h' => $secs / 3600 % 24,
            'm' => $secs / 60 % 60,
            's' => $secs % 60
        );

        foreach ($bit as $k => $v)
            if ($v > 0) $ret[] = $v . $k;

        return join(' ', $ret);
    }
}

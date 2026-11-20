<?php
function get_reading_time($content, $wpm = 200)
{
    $clean_text = strip_tags($content);
    $words = str_word_count($clean_text);
    $minutes = max(1, (int) ceil($words / $wpm));
    return $minutes . ' min read';
}

function get_initial_name($name)
{
    $words = explode(' ', trim($name));
    $initials = count($words) > 1 ? mb_substr($words[0], 0, 1) . mb_substr($words[1], 0, 1) : mb_substr($name, 0, 2);
    return $initials;
}

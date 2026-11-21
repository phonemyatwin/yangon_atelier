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

function phone_number($numbers)
{
    $trimmed = trim($numbers);
    if (!preg_match('/^\+?[0-9\s\-()]{7,20}$/', $trimmed)) {
        return null;
    }

    $purified = preg_replace('/[\s\-()]/', '', $trimmed);

    if (!preg_match('/^(\+?[1-9][0-9]{6,14}|0[0-9]{7,14})$/', $purified)) {
        return null;
    }
    return $purified;
}

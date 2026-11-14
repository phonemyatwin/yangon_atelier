<?php
function get_reading_time($content, $wpm = 200)
{
    $clean_text = strip_tags($content);
    $words = str_word_count($clean_text);
    $minutes = max(1, (int) ceil($words / $wpm));
    return $minutes . ' min read';
}
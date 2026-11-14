<?php

function get_reading_time($content, $wpm = 200)
{
    $clean_text = strip_tags($content);
    $words = str_word_count($clean_text);
    $minutes = max(1, (int) ceil($words / $wpm));
    return $minutes . ' min read';
}

function resolve_blog_image($image, $prefix = '')
{
    if (empty($image)) {
        return $prefix . 'images/blogs/blog1.jpg';
    }
    // Check in media/
    if (file_exists(__DIR__ . '/../media/' . $image)) {
        return $prefix . 'media/' . $image;
    }
    // Check in images/
    if (file_exists(__DIR__ . '/../images/' . $image)) {
        return $prefix . 'images/' . $image;
    }
    // Check in images/blogs/
    if (file_exists(__DIR__ . '/../images/blogs/' . basename($image))) {
        return $prefix . 'images/blogs/' . basename($image);
    }
    return $prefix . 'images/blogs/blog1.jpg';
}

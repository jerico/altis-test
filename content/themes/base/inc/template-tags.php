<?php

namespace Base\Template_Tags;

function render_post_meta($post_id) {
    $author = get_the_author_meta('display_name', get_post_field('post_author', $post_id));
    $date = get_the_date('F j, Y', $post_id);

    if($author) {
        echo '<p class="meta">By ' . $author . ' on ' . $date . '</p>';
    }
}

function get_reading_time($post_id) {
    $content = get_post_field("post_content", $post_id);
    $word_count = str_word_count(strip_tags($content));
    $reading_time = ceil($word_count / 200);

    if($reading_time == 1) {
        return "1 minute";
    }

    return $reading_time . " minutes";
}

<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class Single extends Controller
{
    public static function tags()
    {
        $output = '';
        $tags = get_the_tags();
        if ($tags) {
            $output .= '<ul class="tags">';
            foreach ($tags as $tag) {
                $output .= sprintf(
                    '<li class="tag"><a href="%1$s">%2$s</a></li>',
                    get_tag_link($tag->term_id),
                    $tag->name
                );
            }
            $output .= '</ul>';
        }
        return $output;
    }

    public function author()
    {
        global $post;

        if (get_post_meta($post->ID, 'pcc_post_authors')) {
            $authors = get_post_meta($post->ID, 'pcc_post_authors');
            if (is_array($authors)) {
                return implode(', ', array_map('get_the_title', $authors));
            } else {
                return get_the_title($authors);
            }
        }

        return false;
    }
}

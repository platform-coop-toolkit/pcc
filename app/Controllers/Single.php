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
            $output .= '<ul class="tags__list">';
            foreach ($tags as $tag) {
                $output .= sprintf('<li><a href="%1$s">%2$s</a></li>', get_tag_link($tag->term_id), $tag->name);
            }
            $output .= '</ul>';
        }
        return $output;
    }
}

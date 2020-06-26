<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class SinglePccStory extends Controller
{
    public function storyOrg () {
        return get_post_meta( get_the_ID(), 'pcc_story_organization', true );
    }

    public function sectors () {
        return SinglePccStory::tagList( 'pcc-sector' );
    }

    public function regions () {
        return SinglePccStory::tagList( 'pcc-region' );
    }

    /*
    Given the taxonomy name, return a link list of terms.
    */
    public static function tagList( $taxonomy='' ) {
        if ($taxonomy) {
            $output = '';

            $terms = get_the_terms (get_the_id(), $taxonomy);

            if ($terms && ! is_wp_error($terms)) {
                $output .= '<ul class="tags">';
                foreach ($terms as $term) {
                    $link = get_term_link ($term->term_id);
                    $output .= '<li class="tag">';
                    $output .= '<a href="'.$link.'">'.$term->name.'</a>';
                    $output .= '</li>';
                }
                $output .= '</ul>';
                return $output;
            }
        }
    }

    public static function getVideoEmbed () {
        return wp_oembed_get(get_post_meta (get_the_ID(), 'pcc_story_video_link', true));
    }
}
?>

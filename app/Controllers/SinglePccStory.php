<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class SinglePccStory extends Controller
{
    /*
    Get the storyteller metadata for this Story. Returns false if no storyteller
    is associated with the Story.
    */
    public function storyteller ()
    {
        $id = get_post_meta (get_the_id(), 'pcc_story_storyteller', true);

        if ($id && !is_wp_error($id)) {
            return get_post($id)->post_title;
        }

        return false;
    }

    /*
    Get the organization name for this Story. Returns false if no organization
    is associated with the Story.
    */
    public function storyOrg () {
        $terms = get_the_terms (get_the_id(), 'pcc-organization');

        if ($terms && !is_wp_error($terms)) {
            return $terms[0]->name;
        }

        return false;
    }

    /*
    Get a link list of sectors associated with the Story. Returns an empty
    string if no sectors found.
    */
    public function sectors () {
        return SinglePccStory::tagList( 'pcc-sector' );
    }

    /*
    Get a link list of regions associated with the Story. Returns an empty
    string if no regions found.
    */
    public function regions () {
        return SinglePccStory::tagList( 'pcc-region' );
    }

    /*
    Get the video embed code for the current Story post. Returns false if Story
    does not have a video link specified, or if the oEmbed fetch fails.
    */
    public static function getVideoEmbed () {
        $link = get_post_meta ( get_the_ID(), 'pcc_story_video_link', true );

        if ($link && ! is_wp_error( $link )) {
            return wp_oembed_get( $link );
        }

        return false;
    }

    /*
    Given the taxonomy name, return a link list of terms.
    Returns an empty String if taxonomy name is invalid or has no terms.
    */
    public static function tagList( $taxonomy='' ) {
        $output = '';

        if ($taxonomy) {
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
            }
        }

        return $output;
    }
}
?>

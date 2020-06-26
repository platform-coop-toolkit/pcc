<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class Taxonomy extends Controller
{
    /*
    Given the current taxonomy term, return an array of unique organizations that has that term.
    */
    public function storyOrgs()
    {
        $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
        if ( !empty ($term) ) {
            $posts = get_posts( array(
                'post_type' => 'pcc-story',
                'numberposts' => -1,
                'tax_query' => array(
                    array(
                      'taxonomy' => $term->taxonomy,
                      'terms' => $term->term_id
                    )
                )
            ) );

            foreach ( $posts as $post ) {
                $orgs[] = get_post_meta ( $post->ID, 'pcc_story_organization', true );
            }

            $orgs = array_unique ( $orgs );
            sort ( $orgs );
            return $orgs;
        }
        return false;
    }
}

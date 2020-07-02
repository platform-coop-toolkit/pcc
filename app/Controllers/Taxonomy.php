<?php

namespace App\Controllers;

use Sober\Controller\Controller;
use Partials\Stories;

class Taxonomy extends Controller
{
    /*
    Given the current taxonomy term, return an array of unique organizations
    that has that term. Return false if there are no organizations.
    */
    public function storyOrgs()
    {

        $term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
        if (!empty($term)) {
            $posts = get_posts(array(
                'post_type' => 'pcc-story',
                'numberposts' => -1,
                'tax_query' => array(
                    array(
                      'taxonomy' => $term->taxonomy,
                      'terms' => $term->term_id
                    )
                )
            ));

            foreach ($posts as $post) {
                $org_terms = get_the_terms($post->ID, 'pcc-organization');
                $orgs[] = $org_terms[0]->name;
            }

            $orgs = array_unique($orgs);
            sort($orgs);
            return $orgs;
        }
        return false;
    }
}

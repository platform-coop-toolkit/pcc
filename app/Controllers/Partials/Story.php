<?php namespace App\Controllers\Partials;

trait Story
{

    /*
    Get an array of regions for a story. Returns false if there are no regions.
    */
    public function storyRegions ()
    {
        $terms = get_the_terms( get_the_id(), 'pcc-region' );
        if ($terms && ! is_wp_error( $terms )) {
            foreach ( $terms as $term ) {
                $regions[] = $term->name;
            }
            return $regions;
        }
        return false;
    }

    /*
    Get the organization for a story, otherwise returns false.
    */
    public function storyOrg ()
    {
        $org = get_post_meta (get_the_id(), 'pcc_story_organization', true);

        if ($org && ! is_wp_error( $org )) {
            return get_post_meta (get_the_id(), 'pcc_story_organization', true);
        }

        return false;
    }
}

?>

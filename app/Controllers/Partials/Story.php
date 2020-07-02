<?php namespace App\Controllers\Partials;

trait Story
{

    /*
    Get an array of regions for a story. Returns false if there are no regions.
    */
    public static function storyRegions ()
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
        $orgs = get_the_terms( get_the_id(), 'pcc-pcc_story_organization' );

        if ($orgs && ! is_wp_error( $orgs )) {
            return $orgs[0];
        }

        return false;
    }
}

?>

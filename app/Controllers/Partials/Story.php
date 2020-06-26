<?php namespace App\Controllers\Partials;

trait Story
{
    public function storyRegions($id = false) {
        $regions = array();
        if ($id) {
            $terms = get_the_terms ($id, 'pcc-region');
            if ($terms && ! is_wp_error($terms)) {
                foreach ($terms as $term) {
                    $regions[] = $term->name;
                }
            } else {
                return false;
            }
            return $regions;
        }
    }
}

?>

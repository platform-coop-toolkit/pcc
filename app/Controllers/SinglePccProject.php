<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class SinglePccProject extends Controller
{
    public static function projectTitle() {
      global $id, $post;
      $title = "";

      if ($post->post_parent) {
        $ancestors = get_post_ancestors($id);
        $root_id = (!empty($ancestors) ? array_pop($ancestors): $post_id);
        $title = get_post($root_id)->post_title;
      } else {
        $title = $post->post_title;
      }

      return $title;
    }

    public static function researchers()
    {
        global $id, $wp;
        $output = [];

        $project_id = get_post_meta($id, 'pcc_project_id', true);

        $researchers = get_post_meta($project_id, 'pcc_project_researchers', true);

        if ($researchers) {
            foreach ($researchers as $researcher_id) {
                $name = get_the_title($researcher_id);
                $output[ $name ] = [
                    'name' => $name,
                    'short_title' => get_post_meta($researcher_id, 'pcc_person_short_title', true),
                    'slug' => get_post($researcher_id)->post_name
                ];
            }
        }

        return $output;
    }

}

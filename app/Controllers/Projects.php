<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class Projects extends Controller
{

    public function projects()
    {
        $output = [];

        /* must only be published! */
        $projects = get_posts([
            'post_type' => 'pcc-project',
            'order' => 'asc',
            'status' => 'published'
        ]);

        if ($projects) {
            foreach ($projects as $p) {
                $page_id = get_post_meta($p->ID, 'pcc_project_page_id', true);

                $output[$p->ID] = [
                  'title' => $p->post_title,
                  'image' => get_post_thumbnail_id($p->ID),
                  'slug' => get_post_field('post_name', $p->ID),
                  'content' => $p->post_content,
                  'page_link_id' => get_page_link($page_id)
                ];
                $page_id = null;
            }
        }
        return $output;
    }
}

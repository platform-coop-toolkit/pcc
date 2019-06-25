<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class SinglePccPerson extends Controller
{
    public function event()
    {
        global $wp;
        if (isset($wp->query_vars['event'])) {
            $event = get_page_by_path($wp->query_vars['event'], 'OBJECT', 'pcc-event');
            if ($event) {
                return $event;
            }
        }
        return false;
    }

    public function participantData()
    {
        global $post;
        $data = [];
        $data['title'] = get_post_meta($post->ID, 'pcc_person_title', true);
        $data['organization'] = get_post_meta($post->ID, 'pcc_person_organization', true);
        $data['organization_link'] = get_post_meta($post->ID, 'pcc_person_organization_link', true);
        return $data;
    }
}

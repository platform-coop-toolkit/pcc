<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class Page extends Controller
{
    public function photoCredits()
    {
        if (basename(get_page_template()) !== 'page-photo-credits.blade.php') {
            return;
        }
        $photos = get_posts([
            'post_type' => 'attachment',
            'numberposts' => '-1',
            'order' => 'asc',
            'meta_query' => [
                'relation' => 'OR',
                [
                    'key'     => 'pcc_attachment_creator_name',
                    'compare' => 'EXISTS',
                ],
                [
                    'key'     => 'pcc_attachment_organization_name',
                    'compare' => 'EXISTS',
                ],
            ],
        ]);
        foreach ($photos as $k => $photo) {
            $pcc_attachment_creator_name = get_post_meta($photo->ID, 'pcc_attachment_creator_name', true);
            $pcc_attachment_creator_link = get_post_meta($photo->ID, 'pcc_attachment_creator_link', true);
            $pcc_attachment_organization_name = get_post_meta($photo->ID, 'pcc_attachment_organization_name', true);
            $pcc_attachment_organization_link = get_post_meta($photo->ID, 'pcc_attachment_organization_link', true);
            if ($pcc_attachment_creator_name &&
                $pcc_attachment_organization_name) {
                if ($pcc_attachment_creator_link) {
                    $creator = sprintf(
                        '<a href="%1$s">%2$s</a>',
                        $pcc_attachment_creator_link,
                        $pcc_attachment_creator_name
                    );
                } else {
                    $creator = $pcc_attachment_creator_name;
                }
                if ($pcc_attachment_organization_link) {
                    $organization = sprintf(
                        '<a href="%1$s">%2$s</a>',
                        $pcc_attachment_organization_link,
                        $pcc_attachment_organization_name
                    );
                } else {
                    $organization = $pcc_attachment_organization_name;
                }
                $photo->credit = sprintf(
                    'Photo by %1$s for %2$s',
                    $creator,
                    $organization
                );
            } elseif ($pcc_attachment_creator_name) {
                if ($pcc_attachment_creator_link) {
                    $creator = sprintf(
                        '<a href="%1$s">%2$s</a>',
                        $pcc_attachment_creator_link,
                        $pcc_attachment_creator_name
                    );
                } else {
                    $creator = $pcc_attachment_creator_name;
                }
                $photo->credit = sprintf(
                    'Photo by %1$s',
                    $creator
                );
            } elseif ($pcc_attachment_organization_name) {
                if ($pcc_attachment_organization_link) {
                    $organization = sprintf(
                        '<a href="%1$s">%2$s</a>',
                        $pcc_attachment_organization_link,
                        $pcc_attachment_organization_name
                    );
                } else {
                    $organization = $pcc_attachment_organization_name;
                }
                $photo->credit = sprintf(
                    'Photo by %1$s',
                    $organization
                );
            }
        }
        return $photos;
    }

    public function peopleQuery()
    {
        $page = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
        $query = new \WP_Query(
            [
                'post_type' => 'pcc-person',
                'posts_per_page' => 9,
                'paged' => $page,
                'meta_key' => 'pcc_person_show_on_people',
                'meta_value' => 'on',
                'orderby' => 'post_title',
                'order' => 'asc',
            ]
        );
        return $query;
    }
}

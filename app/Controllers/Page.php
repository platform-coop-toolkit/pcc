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
        $photos = get_posts(['post_type' => 'attachment', 'numberposts' => '-1']);
        foreach ($photos as $k => $photo) {
            if (get_post_type($photo->post_parent) === 'pcc-event') {
                // Don't include event banners.
                unset($photos[$k]);
            } else {
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
                }
            }
        }
        return $photos;
    }
}

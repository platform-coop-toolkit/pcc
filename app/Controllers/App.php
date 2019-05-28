<?php

namespace App\Controllers;

use Sober\Controller\Controller;
use function PlatformCoop\Utils\get_config_option;

class App extends Controller
{
    public function siteName()
    {
        return get_bloginfo('name');
    }

    public static function title()
    {
        global $post, $wp;
        if (is_home()) {
            if ($home = get_option('page_for_posts', true)) {
                return get_the_title($home);
            }
            return __('Latest Posts', 'pcc');
        }
        if (is_archive()) {
            return get_the_archive_title();
        }
        if (is_search()) {
            return sprintf(__('Search Results for %s', 'pcc'), get_search_query());
        }
        if (is_404()) {
            return __('404 Error', 'pcc');
        }
        if (is_page() && $post->post_parent === get_page_by_path('about/benefits')->ID) {
            $title = get_the_title();
            return
                str_replace(
                    $title,
                    "<span class='small-title'>How platform co-ops can benefit</span> <br /><span class='has-text-color has-dark-blue-color'>$title</span>",
                    $title
                );
        }
        if ($post->post_type === 'pcc-event') {
            if (isset($wp->query_vars['participants'])) {
                if ($wp->query_vars['participants'] === 'yes') {
                    return __('Participants', 'pcc');
                }
                $person = get_page_by_path(
                    $wp->query_vars['participants'],
                    'OBJECT',
                    'pcc-person'
                );
                return $person->post_title;
            };
            if (isset($wp->query_vars['program']) && $wp->query_vars['program'] === 'yes') {
                return __('Program', 'pcc');
            }
        }
        return get_the_title();
    }

    public function donateLink()
    {
        return (function_exists('\PlatformCoop\Utils\get_config_option'))
            ? get_config_option(
                'donate_link',
                'https://go.newschool.edu/s/1811/17/interior.aspx?sid=1811&gid=2&pgid=537&cid=1698&dids=34&bledit=1'
            )
            : 'https://go.newschool.edu/s/1811/17/interior.aspx?sid=1811&gid=2&pgid=537&cid=1698&dids=34&bledit=1';
    }

    public function contactLink()
    {
        $contact_page = get_page_by_title('Contact Us');
        if ($contact_page) {
            return get_permalink($contact_page->ID);
        }
        return '';
    }

    public function mailingAddress()
    {
        $args = [
            'post_type' => 'wp_block',
            'posts_per_page' => 1,
            'title' => 'Mailing Address',
        ];
        $block = false;
        $blocks = new \WP_Query($args);
        if ($blocks->have_posts()) {
            while ($blocks->have_posts()) {
                $blocks->the_post();
                $block = get_post(get_the_id());
            }
            wp_reset_postdata();
        }
        $mailing_address = ( $block ) ? $block->post_content : 'Platform Cooperativism Consortium
79 5th Ave 16th floor, Rm. 1601
New York, NY 10003
USA';
        return apply_filters('the_content', $mailing_address);
    }

    public function signupText()
    {
        $signup_text = (function_exists('\PlatformCoop\Utils\get_config_option'))
            ? get_config_option(
                'signup_text',
                __('Once a month, we’ll email you with the latest news and activity in the community.', 'pcc')
            )
            : __('Once a month, we’ll email you with the latest news and activity in the community.', 'pcc');
        return wpautop($signup_text);
    }

    public function signupLink()
    {
        return (function_exists('\PlatformCoop\Utils\get_config_option'))
            ? get_config_option(
                'signup_link',
                'https://lists.riseup.net/www/info/platformcoop-newsletter'
            )
            : 'https://lists.riseup.net/www/info/platformcoop-newsletter';
    }

    public function socialNetworks()
    {
        $social = [];
        $options = get_option('the_seo_framework_site_options');
        $social['facebook'] = [
            'url' => $options['knowledge_facebook'] ?? 'https://www.facebook.com/groups/1487620331468306/',
        ];
        $social['twitter'] = [
            'url' => $options['knowledge_twitter'] ?? 'https://twitter.com/platformcoop/',
        ];
        return $social;
    }

    public function children()
    {
        global $id;
        $children = get_children(['post_parent' => $id, 'post_type' => 'page', 'orderby' => 'menu_order', 'order' => 'asc']);
        return $children;
    }

    public function breadcrumb()
    {
        global $post, $wp;

        if (isset($wp->query_vars['participants']) || isset($wp->query_vars['program'])) {
            // We are on a sub-view of a top-level, so the breadcrumb should link to the event itself.
            $url = get_the_permalink($post);
            $label = __('Back to event', 'pcc');
        } elseif (isset($wp->query_vars['event'])) {
            // Participant in event view.
            $url = home_url("/events/{$wp->query_vars['event']}/");
            $label = __('Back to event', 'pcc');
        } elseif ($post->post_parent) {
            // We have a parent to link back to.
            $url = get_the_permalink($post->post_parent);
            $label = ($post->post_type === 'pcc-event') ? __('Back to event', 'pcc') : sprintf(__('Back to %s', 'pcc'), get_the_title($post->post_parent));
        } else {
            // Back home.
            $url = get_home_url();
            $label = __('Back to home', 'pcc');
        }

        return [
            'url' => $url,
            'label' => $label,
        ];
    }
}

<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class SinglePccEvent extends Controller
{
    public static function eventParticipants($limit = -1)
    {
        global $id;
        $participants = get_post_meta($id, 'pcc_event_participants', true);
        $output = [];
        if ($participants) {
            foreach ($participants as $participant_id) {
                $name = get_the_title($participant_id);
                $output[ $name ] = [
                    'name' => $name,
                    'title' => get_post_meta($participant_id, 'pcc_person_title', true),
                    'headshot' => get_post_thumbnail_id($participant_id),
                    'slug' => get_post_field('post_name', $participant_id),
                ];
            }
        }
        ksort($output);
        if ($limit !== -1 && $limit >= 1) {
            return array_slice($output, 0, $limit);
        }
        return $output;
    }

    public function eventView()
    {
        global $post, $wp;
        if ($post->post_type !== 'pcc-event') {
            return false;
        }

        if (isset($wp->query_vars['participants'])) {
            return ($wp->query_vars['participants'] === 'yes') ? 'participants' : 'participant';
        }

        if (isset($wp->query_vars['program'])) {
            return ($wp->query_vars['program'] === 'yes') ? 'program' : false;
        }

        if ($post->post_parent) {
            return 'session';
        }

        return false;
    }

    public function eventParticipant()
    {
        global $post, $wp;
        if ($post->post_type !== 'pcc-event') {
            return false;
        }

        if (isset($wp->query_vars['participants'])) {
            if ($wp->query_vars['participants'] !== 'yes') {
                $participant = get_page_by_path(
                    $wp->query_vars['participants'],
                    'OBJECT',
                    'pcc-person'
                );
                if (!$participant) {
                    return false;
                } else {
                    return $participant;
                }
            }
        }

        return false;
    }

    public function eventDate()
    {
        global $id;
        $start = (int) get_post_meta($id, 'pcc_event_start', true);
        $end = (int) get_post_meta($id, 'pcc_event_end', true);
        $multiday = strftime('%F', $start) !== strftime('%F', $end);
        if ($multiday) {
            $same_month = strftime('%m', $start) === strftime('%m', $end);
            if ($same_month) {
                $output = strftime('%B %e', $start) . '–' . ltrim(strftime('%e, %Y', $end));
            } else {
                $output = strftime('%B %e', $start) . '–' . ltrim(strftime('%B %e, %Y', $end));
            }
        } else {
            $same_meridian = strftime('%P', $start) === strftime('%P', $end);
            if ($same_meridian) {
                $output = strftime('%h %e, %Y %l:%M', $start) . '–' . ltrim(strftime('%l:%M%p', $end));
            } else {
                $output = strftime('%h %e, %Y %l:%M%p', $start) . '–' . ltrim(strftime('%l:%M%p', $end));
            }
        }
        return $output;
    }

    public function eventType()
    {
        global $id;
        return get_post_meta($id, 'pcc_event_type', true);
    }

    public function eventTypeLabel()
    {
        global $id;
        $type = get_post_meta($id, 'pcc_event_type', true);
        $types = [
            'community' => __('Community Event', 'platformcoop'),
            'conference' => sprintf(
                /* Translators: conference year */
                __('Conference %s', 'platformcoop'),
                strftime('%Y', (int) get_post_meta($id, 'pcc_event_start', true))
            ),
            'pcc' => __('PCC Event', 'platformcoop'),
            'icde' => __('ICDE  Event', 'platformcoop'),
        ];
        return $types[ $type ] ?? false;
    }

    public function eventVenue()
    {
        global $id;
        return wpautop(
            get_post_meta($id, 'pcc_event_venue', true)
            . "\n"
            . get_post_meta($id, 'pcc_event_venue_address', true)
        );
    }

    public static function registrationLink($id = 0)
    {
        if (!$id) {
            $id = get_the_ID();
        }
        return get_post_meta($id, 'pcc_event_registration_url', true);
    }

    public function eventSponsors()
    {
        $sponsors = (array) get_post_meta(get_the_ID(), 'pcc_event_sponsors', true);
        return array_filter($sponsors);
    }

    public function eventProgram()
    {
        global $post;
        $program = new \WP_Query([
            'post_type' => 'pcc-event',
            'posts_per_page' => -1,
            'post_parent' => $post->ID,
            'meta_key' => 'pcc_event_start',
            'orderby' => 'meta_value',
            'order' => 'asc',
        ]);
        $tmp = $result = [];
        if ($program->have_posts()) {
            while ($program->have_posts()) {
                $program->the_post();
                $tmp[ $program->post->pcc_event_start ] = $program->post;
            }
            wp_reset_postdata();
        }
        ksort($tmp);
        $previous_day = false;
        foreach ($tmp as $k => $v) {
            $day = strftime('%B %e, %Y', $v->pcc_event_start);
            if ($previous_day && $previous_day === $day) {
                $result[ $previous_day ][ $v->post_name ] = $v;
            } else {
                $result[ $day ][ $v->post_name ] = $v;
            }
            $previous_day = $day;
        }
        return $result;
    }
}

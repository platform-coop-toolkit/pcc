<?php

namespace App\Controllers;

use CommerceGuys\Addressing\Address;
use CommerceGuys\Addressing\Formatter\DefaultFormatter;
use CommerceGuys\Addressing\AddressFormat\AddressFormatRepository;
use CommerceGuys\Addressing\Country\CountryRepository;
use CommerceGuys\Addressing\Subdivision\SubdivisionRepository;
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
        global $wp;

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
            'community' => __('Community Event', 'pcc'),
            'conference' => sprintf(
                /* Translators: conference year */
                __('Conference %s', 'pcc'),
                strftime('%Y', (int) get_post_meta($id, 'pcc_event_start', true))
            ),
            'pcc' => __('PCC Event', 'pcc'),
            'icde' => __('ICDE  Event', 'pcc'),
        ];
        return $types[ $type ] ?? false;
    }

    public function eventVenue()
    {
        global $id;
        $addressFormatRepository = new AddressFormatRepository();
        $countryRepository = new CountryRepository();
        $subdivisionRepository = new SubdivisionRepository();
        $formatter = new DefaultFormatter($addressFormatRepository, $countryRepository, $subdivisionRepository);

        $venue_name = get_post_meta($id, 'pcc_event_venue', true);
        $venue_street_address = get_post_meta($id, 'pcc_event_venue_street_address', true);
        $venue_locality = get_post_meta($id, 'pcc_event_venue_locality', true);
        $venue_region = get_post_meta($id, 'pcc_event_venue_region', true);
        $venue_postal_code = get_post_meta($id, 'pcc_event_venue_postal_code', true);
        $venue_country = get_post_meta($id, 'pcc_event_venue_country', true);

        $address = new Address();
        $address = $address
            ->withOrganization($venue_name)
            ->withAddressLine1($venue_street_address)
            ->withLocality($venue_locality)
            ->withAdministrativeArea($venue_region)
            ->withPostalCode($venue_postal_code)
            ->withCountryCode($venue_country);

        return $formatter->format($address, ['html_attributes' => ['translate' => 'no', 'class' => 'address']]);
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

    public function eventRibbon()
    {
        global $post, $wp;

        return [
            [
                'class' => false,
                'rel' =>
                    (
                        !$post->post_parent &&
                        !isset($wp->query_vars['participants']) &&
                        !isset($wp->query_vars['program'])
                    ) ?
                    'current' :
                    false,
                'link' => ($post->post_parent) ? get_permalink($post->post_parent) : get_permalink($post),
                'label' => (get_post_meta($post->ID, 'pcc_event_type', true) === 'conference') ?
                    __('Conference', 'pcc') :
                    __('Event', 'pcc'),
            ],
            [
                'class' => ($post->post_parent) ? 'parent' : '',
                'rel' => (isset($wp->query_vars['program']) && $wp->query_vars['program'] === 'yes') ?
                    'current' :
                    false,
                'link' => ($post->post_parent) ?
                    get_permalink($post->post_parent) . 'program/' :
                    get_permalink($post) . 'program/',
                'label' => __('Program', 'pcc'),
            ],
            [
                'class' => false,
                'rel' => (isset($wp->query_vars['participants']) && $wp->query_vars['participants'] === 'yes') ?
                    'current' :
                    false,
                'link' => get_permalink($post) . 'participants/',
                'label' => __('Participants', 'pcc'),
            ],
        ];
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

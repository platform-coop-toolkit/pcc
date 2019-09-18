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
        $data['short_title'] = get_post_meta($post->ID, 'pcc_person_short_title', true);
        $data['organization'] = get_post_meta($post->ID, 'pcc_person_organization', true);
        $locality = get_post_meta($post->ID, 'pcc_person_locality', true);
        $country = get_post_meta($post->ID, 'pcc_person_country', true);
        if ($locality && $country) {
            $data['locality'] = implode(', ', [$locality, $country]);
        } elseif ($country) {
            $data['locality'] = $country;
        }
        $data['links'] = get_post_meta($post->ID, 'pcc_person_links', true);
        if (is_array($data['links'])) {
            foreach ($data['links'] as $key => $value) {
                $label = (!empty($value['label'])) ? $value['label'] : untrailingslashit($value['link']);
                if (strpos($value['link'], 'twitter.com')) {
                    $label = '<svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 35 35"><path fill="currentColor" d="M21.224,5.157a17.5,17.5,0,1,0,17.5,17.5A17.5,17.5,0,0,0,21.224,5.157Zm8.815,13.972c.009.189.013.379.013.571A12.544,12.544,0,0,1,10.743,30.267a9.019,9.019,0,0,0,1.052.061,8.848,8.848,0,0,0,5.477-1.888,4.417,4.417,0,0,1-4.119-3.064,4.307,4.307,0,0,0,.829.079,4.383,4.383,0,0,0,1.162-.154,4.414,4.414,0,0,1-3.539-4.324c0-.019,0-.038,0-.057a4.4,4.4,0,0,0,2,.552,4.416,4.416,0,0,1-1.365-5.889,12.521,12.521,0,0,0,9.091,4.607,4.413,4.413,0,0,1,7.515-4.022,8.809,8.809,0,0,0,2.8-1.07,4.423,4.423,0,0,1-1.94,2.44,8.817,8.817,0,0,0,2.534-.694A8.91,8.91,0,0,1,30.039,19.129Z" transform="translate(-3.723 -5.157)"></path></svg>' . // @codingStandardsIgnoreLine
                        str_replace('https://twitter.com/', '@', $label);
                } else {
                    $label = '<svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 35 35"><path d="M63.92,1184.39a17.5,17.5,0,1,1-17.5,17.5A17.51,17.51,0,0,1,63.92,1184.39Zm8.68,8h0a5.53,5.53,0,0,0-7.68.75l-1.62,1.94a1.38,1.38,0,0,0,2.11,1.77l1.62-1.94a2.77,2.77,0,0,1,3.88-.34l.06.05a2.82,2.82,0,0,1,.23,3.88l-3.37,4,0,0a2.6,2.6,0,0,1-.62.53,2.75,2.75,0,0,1-3.46-.46,1.38,1.38,0,1,0-2,1.88,5.5,5.5,0,0,0,5,1.67,5.93,5.93,0,0,0,.83-.21,5.35,5.35,0,0,0,2.45-1.68l3.36-4a5.7,5.7,0,0,0,1.28-4.16A5.43,5.43,0,0,0,72.6,1192.41Zm-9.93,14.91-1.45,1.73a2.8,2.8,0,0,1-3.85.46,2.74,2.74,0,0,1-.46-3.86l0-.06,3.42-4.1,0,0a3.16,3.16,0,0,1,.62-.53,2.75,2.75,0,0,1,3.21.23,2.72,2.72,0,0,1,.3.29,1.37,1.37,0,0,0,2.07,0l0,0a1.37,1.37,0,0,0,0-1.79,5.51,5.51,0,0,0-7.77-.48,4.71,4.71,0,0,0-.58.6l-3.41,4.08a5.53,5.53,0,0,0,.62,7.7,5.44,5.44,0,0,0,4,1.29,4.35,4.35,0,0,0,.52-.06,5.69,5.69,0,0,0,3.36-1.94l1.44-1.72a1.38,1.38,0,0,0-2.12-1.77Z" transform="translate(-46.42 -1184.39)"/></svg>' . // @codingStandardsIgnoreLine
                        $label;
                }
                $data['links'][$key]['label'] = $label;
            }
        }
        return $data;
    }
}

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
}

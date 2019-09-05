<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class Home extends Controller
{
    public function blogPage()
    {
        return get_post(get_option('page_for_posts'));
    }
}

<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class SinglePccStory extends Controller
{
    public function sectors() {
        global $post;
        $args = [
          'ul_classname' => 'tags',
          'li_classname' => 'tag',
          'id' => $post->ID
        ];
        return App::tagList ('pcc-sector', $args);
    }

    public function regions() {
        global $post;
        $args = [
          'ul_classname' => 'tags',
          'li_classname' => 'tag',
          'id' => $post->ID
        ];

        return App::tagList ('pcc-region', $args);
    }
}
?>

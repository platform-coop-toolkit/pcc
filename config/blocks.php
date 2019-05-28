<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Register theme color palette
    |--------------------------------------------------------------------------
    |
    | Colors defined in this array will be registered with the
    | WordPress block editor.
    |
    | Styles must still be implemented in `styles/common/variables`.
    |
    */

    'colors' => [
        [
            'name' => __('Dark Green', 'pcc'),
            'slug' => 'dark-green',
            'color' => '#076431',
        ],
        [
            'name' => __('Green', 'pcc'),
            'slug' => 'green',
            'color' => '#0B8441',
        ],
        [
            'name' => __('Light Green', 'pcc'),
            'slug' => 'light-green',
            'color' => '#45D385',
        ],
        [
            'name' => __('Pale Green', 'pcc'),
            'slug' => 'pale-green',
            'color' => '#C9F8DB',
        ],
        [
            'name' => __('Dark Red', 'pcc'),
            'slug' => 'dark-red',
            'color' => '#973102',
        ],
        [
            'name' => __('Red', 'pcc'),
            'slug' => 'red',
            'color' => '#FF621A',
        ],
        [
            'name' => __('Light Red', 'pcc'),
            'slug' => 'light-red',
            'color' => '#FFA47A',
        ],
        [
            'name' => __('Lighter Red', 'pcc'),
            'slug' => 'lighter-red',
            'color' => '#FCC2A7',
        ],
        [
            'name' => __('Pale Red', 'pcc'),
            'slug' => 'pale-red',
            'color' => '#FDC2A7',
        ],
        [
            'name' => __('Dark Blue', 'pcc'),
            'slug' => 'dark-blue',
            'color' => '#16605D',
        ],
        [
            'name' => __('Blue', 'pcc'),
            'slug' => 'blue',
            'color' => '#1D7C79',
        ],
        [
            'name' => __('Light Blue', 'pcc'),
            'slug' => 'light-blue',
            'color' => '#30CFC9',
        ],
        [
            'name' => __('Pale Blue', 'pcc'),
            'slug' => 'pale-blue',
            'color' => '#C5FDF9',
        ],
        [
            'name' => __('Dark Yellow', 'pcc'),
            'slug' => 'dark-yellow',
            'color' => '#E8AA00',
        ],
        [
            'name' => __('Yellow', 'pcc'),
            'slug' => 'yellow',
            'color' => '#FACE00',
        ],
        [
            'name' => __('Pale Yellow', 'pcc'),
            'slug' => 'pale-yellow',
            'color' => '#FCEEB0',
        ],
        [
            'name' => __('White', 'pcc'),
            'slug' => 'white',
            'color' => '#fff',
        ],
        [
            'name' => __('Off White', 'pcc'),
            'slug' => 'off-white',
            'color' => '#F9F9F7',
        ],
        [
            'name' => __('Grey', 'pcc'),
            'slug' => 'grey',
            'color' => '#707070',
        ],
        [
            'name' => __('Light Grey', 'pcc'),
            'slug' => 'light-grey',
            'color' => '#F0EFEF',
        ],
        [
            'name' => __('Dark Mint', 'pcc'),
            'slug' => 'dark-mint',
            'color' => '#203131',
        ],
        [
            'name' => __('Dark Mint Light', 'pcc'),
            'slug' => 'dark-mint-light',
            'color' => '#294040',
        ],
        [
            'name' => __('Warm Grey', 'pcc'),
            'slug' => 'warm-grey',
            'color' => '#585850',
        ],
        [
            'name' => __('Warm Grey Light', 'pcc'),
            'slug' => 'warm-grey-light',
            'color' => '#B2B2A7',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Register theme font sizes
    |--------------------------------------------------------------------------
    |
    | Font-sizes defined in this array will be registered with the
    | WordPress block editor.
    |
    | Styles must still be implemented in `styles/common/variables`.
    |
    */

    'font_sizes' => [
        [
            'name'      => __('small', 'sage'),
            'shortName' => __('S', 'sage'),
            'size'      => 12,
            'slug'      => 'small'
        ],
        [
            'name'      => __('normal', 'sage'),
            'shortName' => __('M', 'sage'),
            'size'      => 16,
            'slug'      => 'normal'
        ],
        [
            'name'      => __('large', 'sage'),
            'shortName' => __('L', 'sage'),
            'size'      => 20,
            'slug'      => 'large'
        ],
        [
            'name'      => __('larger', 'sage'),
            'shortName' => __('XL', 'sage'),
            'size'      => 24,
            'slug'      => 'larger'
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Whitelist blocks
    |--------------------------------------------------------------------------
    |
    | Blocks whitelisted for use in the editor. Whitelists can be set globally
    | or maintained on a posttype-by-posttype basis.
    |
    | - Blocks in `global` are made available to the inserter for all posttypes.
    | - Blocks in `posts`  are made available to the inserter for all posts.
    | - Blocks in `pages`  are made available to the inserter for all pages.
    |
    | - If you have custom post types this schema can be easily extended
    |   using the 'allowed_block_type' filter found in `app/filters.php`.
    |
    | Should you prefer to not use a whitelist (WordPress default) then
    | the entirety of this array can be commented out or removed.
    |
    */

    'whitelist' => [

        'global' => [
            /**
             * Category: Common
             */
            'core/paragraph',
            'core/heading',
            'core/gallery',
            'core/list',
            'core/quote',
            'core/audio',
            'core/cover',
            'core/file',
            'core/video',

            /**
             * Category: Formatting
             */
            'core/table',
            'core/code',
            'core/freeform',
            'core/html',
            'core/preformatted',
            'core/pullquote',

            // 'core/verse',

            /**
             * Category: Layout Elements
             **/
            'core/button',
            'core/text-columns',
            'core/group',
            'core/media-text',
            'core/more',
            'core/nextpage',
            'core/separator',
            'core/spacer',

            /**
             * Category: Widgets
             **/
            'core/shortcode',

            // 'core/archives',
            // 'core/categories',
            // 'core/latest-comments',
            // 'core/latest-posts',

            /**
             * Category: Embeds
             **/
            'core/embed',
            'core-embed/twitter',
            'core-embed/youtube',
            'core-embed/facebook',
            'core-embed/instagram',
            'core-embed/wordpress',
            'core-embed/soundcloud',
            'core-embed/spotify',
            'core-embed/flickr',
            'core-embed/vimeo',
            'core-embed/imgur',
            'core-embed/reddit',

            // 'core-embed/animoto',
            // 'core-embed/cloudup',
            // 'core-embed/collegehumor',
            // 'core-embed/dailymotion',
            // 'core-embed/funny-or-die',
            // 'core-embed/hulu',
            // 'core-embed/issuu',
            // 'core-embed/kickstarter',
            // 'core-embed/meetup-com',
            // 'core-embed/mixcloud',
            // 'core-embed/photobucket',
            // 'core-embed/polldaddy',
            // 'core-embed/reverbnation',
            // 'core-embed/screencast',
            // 'core-embed/scribd',
            // 'core-embed/slideshare',
            // 'core-embed/smugmug',
            // 'core-embed/ted',
            // 'core-embed/tumblr',
            // 'core-embed/videopress',
            // 'core-embed/wordpress-tv',
        ],
        'post' => [],
        'page' => [],
    ],
];

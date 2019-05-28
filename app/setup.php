<?php

namespace App;

use Roots\Sage\Container;
use Roots\Sage\Assets\JsonManifest;
use Roots\Sage\Template\Blade;
use Roots\Sage\Template\BladeProvider;

/**
 * Theme assets
 */
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('platformcoop/main.css', asset_path('styles/main.css'), false, null);
    wp_enqueue_script('platformcoop/main.js', asset_path('scripts/main.js'), false, null, true);

    if (is_single() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }

    $cf7 = false;
    if (is_singular()) {
        $post = get_post();
        if (has_shortcode($post->post_content, 'contact-form-7')) {
            $cf7 = true;
        }
    }

    if (!$cf7) {
        wpcf7_enqueue_scripts();
    }
}, 100);

/**
 * Block styles
 */
add_action('enqueue_block_editor_assets', function () {
    // wp_enqueue_style('platformcoop/editor.css', asset_path('styles/editor.css'), false, null);
    wp_enqueue_script(
        'platformcoop/block-styles.js',
        asset_path('scripts/block-styles.js'),
        ['wp-blocks', 'wp-dom'],
        null,
        true
    );
});

/**
 * Block styles
 */
add_action('enqueue_block_assets', function () {
    wp_enqueue_style('platformcoop/blocks.css', asset_path('styles/blocks.css'), false, null);
    // @see https://github.com/roots/sage/issues/1911#issuecomment-314210060
    wp_enqueue_script('platformcoop/blocks.js', asset_path('scripts/blocks.js'), false, null, true);
});


/**
 * Remove Emoji
 */
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_styles', 'print_emoji_styles');

/**
 * Output root colours
 */
add_action('wp_head', function () {
    echo get_color_vars();
});

/**
 * Output root colours
 */
add_action('admin_head', function () {
    echo get_color_vars();
});

/**
 * Theme setup
 */
add_action('after_setup_theme', function () {
    /**
     * Enable features from Soil when plugin is activated
     * @link https://roots.io/plugins/soil/
     */
    add_theme_support('soil-clean-up');
    add_theme_support('soil-jquery-cdn');
    add_theme_support('soil-nav-walker');
    add_theme_support('soil-nice-search');
    add_theme_support('soil-relative-urls');

    /**
     * Add theme support for Wide Alignment
     * @link https://wordpress.org/gutenberg/handbook/designers-developers/developers/themes/theme-support/#wide-alignment
     */
    add_theme_support('align-wide');

    /**
     * Add editor styles
     * @link https://wordpress.org/gutenberg/handbook/designers-developers/developers/themes/theme-support/#editor-styles
     */
    add_theme_support('editor-styles');
    add_editor_style(asset_path('styles/editor.css'));

    /**
     * Enable responsive embeds
     * @link https://wordpress.org/gutenberg/handbook/designers-developers/developers/themes/theme-support/#responsive-embedded-content
     */
    add_theme_support('responsive-embeds');

    /**
     * Dequeue Gutenberg CSS
     * @link https://wordpress.org/gutenberg/?s=dequeue (404)
     */
    add_action('wp_enqueue_scripts', function () {
        wp_dequeue_style('wp-block-library');
    }, 100);

    /**
     * Add color palette support
     */
    add_theme_support('editor-color-palette', (block_vars())->colors);

    /**
     * Add font size support
     */
    add_theme_support('editor-font-sizes', (block_vars())->font_sizes);

    /**
     * Enable plugins to manage the document title
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
     */
    add_theme_support('title-tag');

    /**
     * Register navigation menus
     * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
     */
    register_nav_menus([
        'primary_navigation' => __('Primary Navigation', 'pcc')
    ]);
    register_nav_menus([
        'footer_navigation' => __('Footer Navigation', 'pcc')
    ]);

    /**
     * Enable post thumbnails
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');

    /**
     * Enable HTML5 markup support
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
     */
    add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);

    /**
     * Enable selective refresh for widgets in customizer
     * @link https://developer.wordpress.org/themes/advanced-topics/customizer-api/#theme-support-in-sidebars
     */
    add_theme_support('customize-selective-refresh-widgets');

    /**
     * Support excerpts for pages.
     */
    add_post_type_support('page', 'excerpt');

    /**
     * Image sizes.
     */
    add_image_size('social', 650, 400, ['center', 'center']);
    add_image_size('person-mobile', 260, 150, ['center', 'center']);
    add_image_size('person-mobile@2x', 520, 300, ['center', 'center']);
    add_image_size('person-desktop', 367, 250, ['center', 'center']);
    add_image_size('person-desktop@2x', 734, 500, ['center', 'center']);
    add_image_size('person-profile', 675, 555, ['center', 'center']);
    add_image_size('person-profile@2x', 1350, 1110, ['center', 'center']);
    add_image_size('banner', 852, 568, ['center', 'center']);
    add_image_size('event-banner@0.5x', 1360, 300, ['center', 'center']);
    add_image_size('event-banner', 2720, 600, ['center', 'center']);
}, 20);

/**
 * Updates the `$post` variable on each iteration of the loop.
 * Note: updated value is only available for subsequently loaded views, such as partials
 */
add_action('the_post', function ($post) {
    sage('blade')->share('post', $post);
});

/**
 * Setup Sage options
 */
add_action('after_setup_theme', function () {
    /**
     * Add JsonManifest to Sage container
     */
    sage()->singleton('sage.assets', function () {
        return new JsonManifest(config('assets.manifest'), config('assets.uri'));
    });

    /**
     * Add Blade to Sage container
     */
    sage()->singleton('sage.blade', function (Container $app) {
        $cachePath = config('view.compiled');
        if (!file_exists($cachePath)) {
            wp_mkdir_p($cachePath);
        }
        (new BladeProvider($app))->register();
        return new Blade($app['view']);
    });

    /**
     * Create @asset() Blade directive
     */
    sage('blade')->compiler()->directive('asset', function ($asset) {
        return "<?= " . __NAMESPACE__ . "\\asset_path({$asset}); ?>";
    });
});

add_action('init', function () {
    add_rewrite_rule(
        '^events/([^/]+)/participants/?$',
        'index.php?pcc-event=$matches[1]&participants=yes',
        'top'
    );
    add_rewrite_rule(
        '^events/([^/]+)/participants/([^/]+)/?$',
        'index.php?pcc-person=$matches[2]&event=$matches[1]',
        'top'
    );
    add_rewrite_rule(
        '^events/([^/]+)/program/?$',
        'index.php?pcc-event=$matches[1]&program=yes',
        'top'
    );
});

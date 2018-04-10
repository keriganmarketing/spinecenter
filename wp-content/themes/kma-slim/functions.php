<?php

/**
 * @package KMA
 * @subpackage kmaslim
 * @since 1.0
 * @version 1.2
 */

use Includes\Modules\Videos\Videos;
use Includes\Modules\Leads\KmaLeads;
use Includes\Modules\Helpers\CleanWP;
use Includes\Modules\Reviews\Reviews;
use Includes\Modules\Layouts\Layouts;
use Includes\Modules\Team\Physicians;
use Includes\Modules\Slider\BulmaSlider;
use Includes\Modules\Comments\CommentBox;
use Includes\Modules\Locations\Locations;
use Includes\Modules\Social\SocialSettingsPage;
use Includes\Modules\KMAFacebook\FacebookController;

require('vendor/autoload.php');

new CleanWP();

$socialLinks = new SocialSettingsPage();
if (is_admin()) {
    $socialLinks->createPage();
}

$layouts = new Layouts();
$layouts->createPostType();
$layouts->createDefaultFormats();

$slider = new BulmaSlider();
$slider->createPostType();
$slider->createAdminColumns();

$physicians = new Physicians();
$physicians->createPostType();
$physicians->createAdminColumns();

$locations = new Locations();
$locations->createPostType();
$locations->createAdminColumns();

$kmaLeads = new KmaLeads();
$kmaLeads->createPostType();
$kmaLeads->createAdminColumns();

$commentBox = new CommentBox();
$commentBox->createPostType();
$commentBox->createAdminColumns();
$commentBox->registerShortcode();

$videos = new Videos();
$videos->createPostType();
$videos->createShortcode();

$facebook = new FacebookController();
$facebook->setupAdmin();

$reviews = new Reviews();
$reviews->setupAdmin();

add_action('after_setup_theme', function () {
    load_theme_textdomain('kmaslim', get_template_directory() . '/languages');
    add_theme_support('automatic-feed-links');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');

    register_nav_menus([
        'mobile-menu' => esc_html__('Mobile Menu', 'kmaslim'),
        'footer-menu' => esc_html__('Footer Menu', 'kmaslim'),
        'main-menu'   => esc_html__('Main Navigation', 'kmaslim')
    ]);

    add_theme_support('html5', [
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption'
    ]);

    add_image_size('large-thumbnail', 300, 300, true);

    add_action('wp_head', function () {
        ?>
        <style type="text/css">
        <?php echo file_get_contents(get_template_directory() . '/style.css'); ?>
        </style><?php
    });
});

add_action('wp_enqueue_scripts', function () {
    wp_enqueue_script('scripts', get_template_directory_uri() . '/app.js', [], null, true);
});

function getPageChildren($pageName, $postChildren = '')
{
    $parent   = get_page_by_title($pageName);
    if($postChildren == '') {
        $children = get_pages([
            'parent'      => $parent->ID,
            'orderby'     => 'menu_order',
            'order'       => 'ASC',
            'post_status' => 'publish'
        ]);
    }else{
        $children = get_posts([
            'post_type'      => $postChildren,
            'posts_per_page' => -1,
            'orderby'        => 'menu_order',
            'order'          => 'ASC',
            'offset'         => 0,
            'post_status'    => 'publish'
        ]);
    }

    echo '<h3 class="page-list-title ' . $parent->post_name . '"><a class="footer-title-link" href="'. get_permalink($parent->ID) . '" >' . $parent->post_title . '</a></h3>';
    echo '<ul class="page-list ' . $parent->post_name . '">';
    foreach($children as $child ) {
        //echo '<pre>',print_r($child),'</pre>';
        echo '<li>' . '<a class="footer-link ' . $child->post_name . '" href="' . get_permalink($child->ID) . '" >' . $child->post_title . '</a>' . '</li>';
    }
    echo '</ul>';

    //return $children;
}

function getInsuranceCarriers(){
    return [
        'Access Care',
        'Aetna EPO, MC & PPO',
        'American Lifecare PPO & POS',
        'Beech Street',
        'Best Care',
        'Blue Cross HMO, PPO, & Key Physician Networks',
        'Champus/Tricare (except Prime)',
        'Choice Care Network',
        'CIGNA',
        'Community Care Network (CCN)',
        'Coventry',
        'First Health',
        'GEHA PPO/USA',
        'Healthstar PPO',
        'Humana',
        'Humana Gold Plus',
        'LWCC--OMNET',
        'Maxicare',
        'Medicare',
        'Multiplan',
        'Peoples Health',
        'PHCS',
        'PPO Plus',
        'Pyramid Life',
        'Secure Horizons Direct',
        'State Group PPO',
        'Sterling',
        'Tenant Choice 65',
        'United Healthcare HMO, POS & PPO',
        'Universal Healthcare USA PPO',
        'Verity Health',
        'Wellcare',
        'Worker\'s Compensation'
    ];
}
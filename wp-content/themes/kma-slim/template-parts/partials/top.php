<?php
use Includes\Modules\Navwalker\BulmaNavwalker;
/**
 * @package KMA
 * @subpackage kmaslim
 * @since 1.0
 * @version 1.2
 */
?>
<div class="site-mobile-overlay"></div>
<header id="top" class="header">
    <div class="container semi-fluid">
        <nav class="navbar">
            <div id="TopNavMenu" class="navbar-menu">
                <a id="main-logo" href="/"><img class="logo"
                                                src="<?php echo get_template_directory_uri() . '/img/logo-duo-tone.png'; ?>"
                                                alt="<?php echo get_bloginfo(); ?>"></a>
                <?php wp_nav_menu([
                    'theme_location' => 'main-menu',
                    'container'      => false,
                    'menu_class'     => 'navbar-start',
                    'fallback_cb'    => '',
                    'menu_id'        => 'main-menu',
                    'link_before'    => '',
                    'link_after'     => '',
                    'items_wrap'     => '<div id="%1$s" class="%2$s">%3$s</div>',
                    'walker'         => new BulmaNavwalker()
                ]); ?>
            </div>

            <div class="navbar-end">
                <span class="top-slash"></span>
                <div class="same-day-appts">
                    <span class="small">Urgent, Same-day Appointments Available:</span>
                    <a href="tel:1-833-774-6327"><span class="large">1-833-SPINEBR</span>
                        <span class="normal">(1-833-774-6327)</span></a>
                </div>
            </div>

            <div class="navbar-brand">
                <a href="/"><img src="<?php echo get_template_directory_uri() . '/img/logo-white.png'; ?>"
                                 alt="<?php echo get_bloginfo(); ?>"></a>
                <div class="navbar-burger burger" id="MobileNavBurger" data-target="MobileNavMenu"
                     @click="toggleMenu">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>

        </nav>
    </div>
</header>
<div class="top-pad"></div>

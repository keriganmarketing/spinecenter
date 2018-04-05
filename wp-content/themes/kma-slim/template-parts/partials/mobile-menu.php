<?php
use Includes\Modules\Navwalker\BulmaNavwalker;
?>
<div id="MobileNavMenu" class="navbar" :class="{ 'is-active': isOpen }">
    <?php wp_nav_menu([
        'theme_location' => 'mobile-menu',
        'container'      => false,
        'menu_class'     => 'navbar-start',
        'fallback_cb'    => '',
        'menu_id'        => 'mobile-menu',
        'link_before'    => '',
        'link_after'     => '',
        'items_wrap'     => '<div id="%1$s" class="%2$s">%3$s</div>',
        'walker'         => new BulmaNavwalker()
    ]); ?>
</div>
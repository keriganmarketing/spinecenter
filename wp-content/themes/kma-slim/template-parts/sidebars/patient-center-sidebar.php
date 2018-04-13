<?php
$parentId = 17;
$pageList = get_children($parentId, [
    'post_parent'    => $parentId,
    'post_type'      => 'page',
    'posts_per_page' => -1,
    'orderby'        => 'menu_order',
    'order'          => 'ASC',
]);
?>
<div class="sidebar-module specialties-list">
    <p class="sidebar-title">Patient Center</p>
    <ul class="none">
        <?php foreach ($pageList as $page){
            echo '<li>' .
                 ($post->ID != $page->ID ? '<a href="' . get_permalink($page->ID) . '" >' : '' ) .
                 $page->post_title .
                 ($post->ID != $page->ID ? '</a>' : '' ) . '</li>';
        } ?>
    </ul>
</div>
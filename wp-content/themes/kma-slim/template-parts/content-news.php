<?php
use Includes\Modules\KMAFacebook\FacebookController;

/**
 * @package KMA
 * @subpackage kmaslim
 * @since 1.0
 * @version 1.2
 */
$headline = ($post->page_information_headline != '' ? $post->page_information_headline : get_the_archive_title());
$subhead  = ($post->page_information_subhead != '' ? $post->page_information_subhead : get_the_archive_description());

include(locate_template('template-parts/partials/top.php'));
?>
<div id="mid">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <section class="header section">
            <div class="header-container">
                <div class="container">
                    <p class="title is-1"><?php echo ($headline == 'Archives' ? 'News' : $headline); ?></p>
                </div>
            </div>
        </section>
        <?php include(locate_template('template-parts/partials/breadcrumbs.php')); ?>
        <section id="content" class="content section clinic-news">
            <div class="container">
                <h1><?php echo($subhead != '' ? '<span class="subtitle">' . $subhead . '</span>' : null); ?></h1>
                <div class="columns is-multiline">
                    <?php

                    $facebook = new FacebookController();
                    $feed = $facebook->getFeed(12);

                    foreach ($feed->posts as $fbPost) {
                        include(locate_template('template-parts/partials/mini-facebook-article.php'));
                    } ?>
                </div>
            </div>
        </section>
    </article><!-- #post-## -->
</div>
<?php include(locate_template('template-parts/partials/bot.php')); ?>
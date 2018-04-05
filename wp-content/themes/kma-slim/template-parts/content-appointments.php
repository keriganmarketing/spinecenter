<?php
/**
 * @package KMA
 * @subpackage kmaslim
 * @since 1.0
 * @version 1.2
 */
$headline = ($post->page_information_headline != '' ? $post->page_information_headline : $post->post_title);
$subhead  = ($post->page_information_subhead != '' ? $post->page_information_subhead : '');
$featuredPhoto = get_the_post_thumbnail( $post, 'post-thumbnail');
print_r($featuredPhoto);
include(locate_template('template-parts/partials/top.php'));
?>
    <div id="mid">
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <section class="header section">
                <div class="header-container">
                    <div class="container">
                        <p class="title is-1"><?php echo $headline; ?></p>
                    </div>
                </div>
            </section>
            <?php include(locate_template('template-parts/partials/breadcrumbs.php')); ?>
            <section id="content" class="content section">
                <div class="container">
                    <div class="entry-content">
                        <h1><?php echo($subhead != '' ? $subhead: null); ?></h1>
                        <?php the_content(); ?>
                    </div>
                    <section class="appointment-form">

                        <?php include(locate_template('template-parts/partials/appointment-request.php')); ?>

                    </section>
                </div>
            </section>

        </article>
    </div>
<?php include(locate_template('template-parts/partials/bot.php')); ?>

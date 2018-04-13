<?php
use Includes\Modules\Team\Physicians;

/**
 * @package KMA
 * @subpackage kmaslim
 * @since 1.0
 * @version 1.2
 */
$headline = ($post->page_information_headline != '' ? $post->page_information_headline : $post->post_title);
$subhead  = ($post->page_information_subhead != '' ? $post->page_information_subhead : '');
$featuredPhoto = get_the_post_thumbnail( $post, 'post-thumbnail');
$author = get_the_category();
$physicians = new Physicians();
$physician = $physicians->getPhysicianBySlug($author->category_nicename);

print_r($physician);

$sidebar = get_the_terms($post,'layout');
$getSidebar = (isset($sidebar[0]->slug) ? $sidebar[0]->slug : '');

include(locate_template('template-parts/partials/top.php'));
?>
    <div id="mid">
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <section class="header section">
                <div class="header-container">
                    <div class="container">
                        <p class="title is-1">Spine Articles</p>
                    </div>
                </div>
            </section>
            <?php include(locate_template('template-parts/partials/breadcrumbs.php')); ?>
            <section id="content" class="content section">
                <div class="container">
                    <div class="entry-content">
                        <div class="columns is-multiline is-variable is-8">
                            <div class="column is-3">
                                <?php include(locate_template('template-parts/sidebars/featured-image-sidebar.php')); ?>
                                <h3>Share this:</h3>
                                <?php
                                //share links
                                $facebookShare = 'https://www.facebook.com/sharer/sharer.php?u=' . get_the_permalink() . '&display=popup';
                                $twitterShare = 'https://twitter.com/home?status=' . get_the_permalink();
                                $googleShare = 'https://plus.google.com/share?url=' . get_the_permalink();
                                $linkedInShare = 'https://www.linkedin.com/shareArticle?mini=true&url=' . get_the_permalink() . '&title=' . urlencode($headline) . '&summary=' . urlencode(wp_trim_words($post->post_content, 22)) . '&source=spinecenterbr.com'
                                ?>
                                <a class="icon is-medium" href="<?php echo $facebookShare; ?>"><i class="fa fa-2x fa-facebook-square" aria-hidden="true" target="_blank"></i></a>
                                <a class="icon is-medium" href="<?php echo $twitterShare; ?>"><i class="fa fa-2x fa-twitter-square" aria-hidden="true" target="_blank"></i></a>
                                <a class="icon is-medium" href="<?php echo $googleShare; ?>"><i class="fa fa-2x fa-google-plus-square" aria-hidden="true" target="_blank"></i></a>
                                <a class="icon is-medium" href="<?php echo $linkedInShare; ?>"><i class="fa fa-2x fa-linkedin-square" aria-hidden="true" target="_blank"></i></a>
                                <?php if($physician) { ?>
                                    <p>&nbsp;</p>
                                    <a class="button is-secondary has-shadow is-rounded is-caps" href="<?php echo $physician['link']; ?>" >More by this author</a>
                                <?php } ?>
                            </div>
                            <div class="column is-9">
                                <h1 class="title is-2 is-primary"><?php echo $headline; ?></h1>
                                <?php if($physician) { ?>
                                <p class="subtitle is-secondary">by <?php echo $physician['name']; ?></p>
                                <?php } ?>
                                <hr>
                                <?php the_content(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section><!--#content-->
        </article>
    </div><!--#mid-->
<?php include(locate_template('template-parts/partials/bot.php')); ?>

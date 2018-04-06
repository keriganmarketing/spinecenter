<?php

use Includes\Modules\Team\Physicians;
use Includes\Modules\Videos\Videos;

/**
 * @package KMA
 * @subpackage kmaslim
 * @since 1.0
 * @version 1.2
 */
$headline = ($post->page_information_headline != '' ? $post->page_information_headline : $post->post_title);

$physicians = new Physicians();
$physician = $physicians->getSingle($headline);
$specialties = $physician['specialties'] != '' ? explode('<br />', nl2br($physician['specialties'])) : [];


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

            <section id="content" class="section">
                <div class="container">
                        <div class="columns is-multiline">
                            <div class="column is-4-tablet is-3-widescreen">
                                <img class="large-physician-photo" src="<?php echo $physician['photo']; ?>" >
                                <a class="button is-primary" href="/patient-center/appointments/?requested_physician=<?php echo $physician['slug']; ?>" >Request an appointment</a>
                            </div>
                            <div class="column is-8-tablet is-9-widescreen">
                                <div class="entry-content content">
                                    <?php //echo '<pre>',print_r($physician),'</pre>'; ?>
                                    <?php the_content(); ?>
                                </div>
                                <hr>
                            </div>
                            <div class="column is-12-tablet is-8-desktop is-9-fullhd is-fourth-desktop">
                                <h2 class="title is-primary">Recent Spine Videos</h2>
                                <p class="subtitle">by <?php echo $physician['name']; ?></p>
                                <div class="columns is-multiline">
                                    <?php

                                    $videoModule = new Videos();
                                    $videos = $videoModule->getVideos([], $physician['slug']);

                                    foreach($videos as $video){ ?>
                                        <div class="column is-6-tablet is-4-desktop">
                                            <a @click="$emit('toggleModal', 'youtube', '<?php echo $video['video_code']; ?>')" >
                                                <figure class="image is-16by9">
                                                    <img src="https://i.ytimg.com/vi/<?php echo $video['video_code']; ?>/0.jpg" alt="<?php echo $video['name']; ?>">
                                                </figure>
                                                <p style="margin-top:.25rem; text-align:center;"><?php echo $video['name']; ?></p>
                                            </a>
                                        </div>
                                    <?php } ?>
                                </div>
                                <hr>
                                <h2 class="title is-primary">Recent Spine Articles</h2>
                                <p class="subtitle">by <?php echo $physician['name']; ?></p>
                                <div class="columns is-multiline">
                                    <?php

                                    $articles = get_posts([
                                        'post_type'      => 'post',
                                        'posts_per_page' => 3,
                                        'orderby'        => 'date',
                                        'order'          => 'DESC',
                                        'offset'         => 0,
                                        'post_status'    => 'publish',
                                        'tax_query' => [
                                            [
                                                'taxonomy'         => 'category',
                                                'field'            => 'slug',
                                                'terms'            => $physician['slug'],
                                                'include_children' => false,
                                            ]
                                        ]
                                    ]);

                                    //echo '<pre>',print_r($articles),'</pre>';

                                    foreach($articles as $post){ ?>
                                        <?php get_template_part('template-parts/partials/mini-article', get_post_format()); ?>
                                    <?php } ?>
                                </div>
                                <hr>
                            </div>
                            <div class="column is-12-tablet is-4-desktop is-3-fullhd is-third-desktop">
                                <div class="sidebar-module physician-list">
                                    <p class="sidebar-title">Choose another doctor</p>
                                    <ul class="none">
                                        <?php $orthopedicSurgeons = $physicians->getPhysicians();
                                        foreach ($orthopedicSurgeons as $doctor){
                                            echo '<li>' .
                                                 ($physician['id'] != $doctor['id'] ? '<a href="' . $doctor['link'] . '" >' : '' ) .
                                                 $doctor['name'] .
                                                 ($physician['id'] != $doctor['id'] ? '</a>' : '' ) . '</li>';
                                        } ?>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
            </section>
        </article>
    </div>
<?php include(locate_template('template-parts/partials/bot.php')); ?>

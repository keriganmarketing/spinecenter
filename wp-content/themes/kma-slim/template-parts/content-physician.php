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
                        <div class="columns is-multiline is-variable is-8">
                            <div class="column is-4-tablet is-3-widescreen has-text-centered">
                                <img class="large-physician-photo" src="<?php echo $physician['photo']; ?>" >
                                <?php if($physician['appointments']){ ?>
                                <a class="button is-primary is-rounded has-shadow is-bold is-caps" href="/patient-center/appointments/?requested_physician=<?php echo $physician['slug']; ?>" >Request an appointment</a>
                                <?php } ?>
                            </div>
                            <div class="column is-8-tablet is-9-widescreen">
                                <div class="entry-content content">
                                    <?php the_content(); ?>
                                </div>
                            </div>
                            <div class="column is-12">
                                <hr>
                            </div>
                            <div class="column is-12-tablet is-9-desktop is-fourth-desktop">
                                <div class="columns is-multiline is-variable is-3">
                                    <?php
                                    $videoModule = new Videos();
                                    $videos = $videoModule->getVideos([], $physician['slug'], 'video_author');

                                    if(count($videos)>0){
                                    ?>
                                    <div class="column is-12">
                                        <h2 class="title is-primary">Recent Spine Videos</h2>
                                        <p class="subtitle">by <?php echo $physician['name']; ?></p>
                                    </div>
                                    <?php foreach($videos as $video){ ?>
                                        <div class="column is-6-tablet is-4-widescreen">
                                            <a @click="$emit('toggleModal', 'youtube', '<?php echo $video['video_code']; ?>')" >
                                                <figure class="image is-16by9">
                                                    <img src="https://i.ytimg.com/vi/<?php echo $video['video_code']; ?>/0.jpg" alt="<?php echo $video['name']; ?>">
                                                </figure>
                                                <p style="margin-top:.25rem; text-align:center;"><?php echo $video['name']; ?></p>
                                            </a>
                                        </div>
                                    <?php } ?>
                                        <div class="column is-12">
                                            <hr>
                                        </div>
                                    <?php } ?>
                                </div>



                                <div class="columns is-multiline is-variable is-3">
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

                                    if(count($articles)>0){
                                    ?>
                                    <div class="column is-12">
                                        <h2 class="title is-primary">Recent Spine Articles</h2>
                                        <p class="subtitle">by <?php echo $physician['name']; ?></p>
                                    </div>
                                    <?php foreach($articles as $post){ ?>
                                        <div class="column is-6-tablet is-4-widescreen">
                                        <?php get_template_part('template-parts/partials/mini-article', get_post_format()); ?>
                                        </div>
                                    <?php } ?>
                                    <?php } ?>
                                </div>

                            </div>

                            <div class="column">
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

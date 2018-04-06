<?php

use Includes\Modules\Slider\BulmaSlider;
use Includes\Modules\Team\Physicians;

/**
 * @package KMA
 * @subpackage kmaslim
 * @since 1.0
 * @version 1.2
 */
$headline = ($post->page_information_headline != '' ? $post->page_information_headline : $post->post_title);
$subhead  = ($post->page_information_subhead != '' ? $post->page_information_subhead : '');

include(locate_template('template-parts/partials/top.php'));
?>
<div id="mid">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="container">
            <div class="appointment-box columns is-justified-end is-gapless">
                <div class="column is-narrow" >
                    <?php include(locate_template('template-parts/partials/mini-appt-box.php')); ?>
                </div>
            </div>
        </div>

        <div class="section-wrapper home-slider">

            <slider>
                <?php
                $slider = new BulmaSlider();
                $slides = $slider->getSlides('home-page-slider');
                $slider = '';

                $i = 0;
                foreach($slides as $slide){
                    $slider .= '<slide :id="'.number_format($i).'" image="'.$slide['photo'].'" >
                        <section class="slide-content">'
                               . ($slide['headline'] != '' ? '<h2 class="title is-1 is-primary">'.$slide['headline'].'</h2>' : '')
                               . ($slide['caption'] != '' ? '<p class="slider-subtitle">'.$slide['caption'].'</p>' : '')
                               . ($slide['description'] != '' ? '<div class="slider-description">'.$slide['description'].'</div>' : '')
                               . ($slide['url'] != '' ? '<a class="button is-primary is-rounded has-shadow" href="'.$slide['link'].'">'
                                                        . ($slide['button_text'] != '' ? $slide['button_text'] : 'More Info') . '</a>' : '') .
                               '</section>
                        </slide>';
                    $i++;
                }
                echo $slider;

                ?>
            </slider>

        </div>

        <div class="section-wrapper home-page-text">

            <div class="container semi-fluid">
                <div class="columns is-multiline">
                    <div class="column is-12-tablet is-6-desktop">
                        <div class="content">
                            <h1 class="title"><?php echo $headline; ?></h1>
                            <?php echo($subhead != '' ? '<p class="subtitle">' . $subhead . '</p>' : null); ?>
                            <?php the_content(); ?>
                        </div>
                    </div>
                    <div class="column is-12-tablet is-6-desktop">
                        <div class="mid-slash"></div>
                        <?php include(locate_template('template-parts/partials/review-module.php')); ?>
                    </div>
                </div>

            </div>

        </div>

        <div class="section-wrapper home-video-area">

            <?php include(locate_template('template-parts/partials/home-video-gallery.php')); ?>

        </div>

        <div class="section-wrapper doctor-carousel is-centered">
            <div class="container">
                <slick ref="slick" :options="slickOptions">
                    <?php
                    $physicians = new Physicians();
                    foreach ($physicians->getPhysicians() as $num => $physician) { ?>
                        <div class="slick-item">
                            <?php include(locate_template('template-parts/partials/mini-physician-thumb.php')); ?>
                        </div>
                    <?php } ?>
                </slick>
                <a href="/our-team/" class="button is-primary is-rounded is-caps">Meet Our Team</a>
            </div>
        </div>

        <div class="section-wrapper specialties-area">

            <?php include(locate_template('template-parts/partials/home-page-specialties.php')); ?>

        </div>

        <div class="section-wrapper promotion-area">

            <?php include(locate_template('template-parts/partials/promotion-strip.php')); ?>

        </div>

        <div class="section-wrapper clinic-news">

            <?php include(locate_template('template-parts/partials/home-page-clinic-news.php')); ?>

        </div>

    </article><!-- #post-## -->
</div>
<?php include(locate_template('template-parts/partials/bot.php')); ?>

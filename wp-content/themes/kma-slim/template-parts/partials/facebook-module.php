<?php
use Includes\Modules\KMAFacebook\FacebookController;

$facebook = new FacebookController();
$feed = $facebook->getFeed(3);

foreach ($feed->posts as $fbPost) {

    $isVideo  = ($fbPost->type == 'video');
    $hasImage = ($fbPost->full_picture != '' && $isVideo == false);
    //$date     = date('M j',strtotime($fbPost->created_time)) . ' at ' . date('g:i a',strtotime($fbPost->created_time));
    $date     = date('M j, Y',strtotime($fbPost->created_time));

    ?>

    <div class="column is-6-tablet is-4-desktop">
        <div class="card social-module facebook has-text-centered <?= ($hasImage == true ? 'has-image' : 'no-image'); ?>">
            <?php if ($hasImage == true) { ?>
                <div class="card-image">
                    <img src="<?= $fbPost->full_picture; ?>">
                </div>
            <?php } ?>
            <?php if ($isVideo == true) { ?>
                <div class="card-video">
                    <iframe
                            src="<?= $fbPost->link; ?>"
                            style="border:none;overflow:hidden"
                            scrolling="no"
                            frameborder="0"
                            allowTransparency="true"
                            allowFullScreen="true"
                            width="100%"
                            height="225">
                    </iframe>
                </div>
            <?php } ?>
            <div class="card-content has-text-centered">
                <p class="posted-on is-bold">Posted <?= $date; ?></p>
                <p class="post-text"><?= $fbPost->message; ?></p>
                <a class="facebook cta-link is-bold is-caps" target="_blank" href="<?= $fbPost->permalink_url; ?>">Read more on Facebook</a>
            </div>
        </div>
    </div>
<?php } ?>

<!--<div class="column is-4">-->
<!--	<div class="article">-->
<!--		<div class="article-image">-->
<!--            <a class="article-footer-item" href="--><?php //echo get_the_permalink(); ?><!--">-->
<!--			<figure class="image is-4by3">-->
<!--			<img src="--><?php //echo the_post_thumbnail_url( 'medium' ); ?><!--">-->
<!--			</figure>-->
<!--            </a>-->
<!--		</div>-->
<!--		<div class="article-content">-->
<!--			--><?php //echo $content; ?>
<!--		</div>-->
<!--		<div class="article-footer">-->
<!--		    <a class="article-footer-item" href="--><?php //echo get_the_permalink(); ?><!--">Read More</a>-->
<!--		</div>-->
<!--	</div>-->
<!--</div>-->

<?php
//share links
$facebookShare = 'https://www.facebook.com/sharer/sharer.php?u=' . get_the_permalink() . '&display=popup';
$twitterShare = 'https://twitter.com/home?status=' . get_the_permalink();
$googleShare = 'https://plus.google.com/share?url=' . get_the_permalink();
$linkedInShare = 'https://www.linkedin.com/shareArticle?mini=true&url=' . get_the_permalink() . '&title=' . urlencode($headline) . '&summary=' . urlencode(wp_trim_words($post->post_content, 22)) . '&source=spinecenterbr.com'
?>
<div class="card">
    <div class="card-photo">
        <figure class="image is-16by9">
            <a href="<?php echo get_the_permalink(); ?>">
                <img src="<?php echo the_post_thumbnail_url('medium'); ?>">
            </a>
        </figure>
    </div>
    <div class="card-content">
        <h2 class="title"><?php echo $headline; ?></h2>
        <?php echo($subhead != '' ? '<p class="subtitle">' . $subhead . '</p>' : null); ?>
        <?php echo wp_trim_words($post->post_content, 22) ?>
    </div>
    <div class="card-footer">
        <a class="card-footer-item" href="<?php echo get_the_permalink(); ?>">Read More</a>
        <span class="card-footer-item">
		      Share:&nbsp;
		      <a class="icon" href="<?php echo $facebookShare; ?>"><i class="fa fa-facebook-square" aria-hidden="true" target="_blank"></i></a>
		      <a class="icon" href="<?php echo $twitterShare; ?>"><i class="fa fa-twitter-square" aria-hidden="true" target="_blank"></i></a>
		      <a class="icon" href="<?php echo $googleShare; ?>"><i class="fa fa-google-plus-square" aria-hidden="true" target="_blank"></i></a>
              <a class="icon" href="<?php echo $linkedInShare; ?>"><i class="fa fa-linkedin-square" aria-hidden="true" target="_blank"></i></a>
	      </span>
    </div>
</div>

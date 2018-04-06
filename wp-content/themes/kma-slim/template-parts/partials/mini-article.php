<div class="column is-4">
    <div class="card">
        <div class="card-photo" >
            <figure class="image is-16by9">
                <a href="<?php echo get_the_permalink(); ?>">
                <img src="<?php echo the_post_thumbnail_url( 'medium' ); ?>">
                </a>
            </figure>
        </div>
        <div class="card-content">
            <h2 class="title"><?php echo $headline; ?></h2>
            <?php echo ($subhead!='' ? '<p class="subtitle">'.$subhead.'</p>' : null); ?>
            <?php echo wp_trim_words($post->post_content, 22)?>
        </div>
        <div class="card-footer">
            <a class="card-footer-item" href="<?php echo get_the_permalink(); ?>">Read More</a>
            <span class="card-footer-item" >
		      Share:&nbsp;
		      <a class="icon" href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
		      <a class="icon" href="#"><i class="fa fa-twitter-square" aria-hidden="true"></i></a>
		      <a class="icon" href="#"><i class="fa fa-google-plus-square" aria-hidden="true"></i></a>
	      </span>
        </div>
    </div>
</div>
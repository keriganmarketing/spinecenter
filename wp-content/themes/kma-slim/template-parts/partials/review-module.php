<?php
//use Includes\Modules\KMAFacebook\FacebookController;
use Includes\Modules\Reviews\Reviews;

//$facebook = new FacebookController();
//$feed = $facebook->getReviews(10);

$reviews = new Reviews();
$feed    = $reviews->getRecentReview();

//echo '<pre>',print_r($feed),'</pre>';

$when  = human_time_diff(strtotime($feed['date'])) . ' ago';
$stars = '';
for ($i = 0; $i < floor($feed['rating']); $i++) {
    $stars .= '<span class="icon is-small">
                <i class="fa fa-star" aria-hidden="true"></i>
               </span>';
}
?>
<div class="review-module">
    <h3 class="title is-1 is-secondary"><span class="open-quote">&ldquo;</span> Patient Reviews</h3>
    <div class="review single">
        <p class="review-text is-large is-info"><?= $feed['content']; ?></p>
        <p class="review-author">
            <span class="name">&mdash; <?= $feed['author']; ?></span><span
                    class="rating"><?= ($stars != '' ? ' rated ' . $stars : ', '); ?></span><span
                    class="source"><?= ($feed['location'] != '' ? ' on ' . $feed['location'] : ''); ?></span><span
                    class="when"><?= ($feed['date'] != '' ? ' ' . $when : ''); ?></span>
        </p>
    </div>
    <a class="more-reviews-link" href="/patient-center/testimonials/">READ MORE REVIEWS</a>
</div>
<?php
use Includes\Modules\KMAFacebook\FacebookController;

$facebook = new FacebookController();
$feed = $facebook->getFeed(3);

/**
 * @package KMA
 * @subpackage kmaslim
 * @since 1.0
 * @version 1.2
 */

if($feed->posts){
?>
<div class="container">
    <h2 class="line-right"><span>News & Info</span><span class="line"></span></h2>

    <div class="article-container">
        <div class="columns is-multiline">
            <?php
            foreach ($feed->posts as $fbPost) {
            
                include(locate_template('template-parts/partials/mini-facebook-article.php'));
            
            }
            ?>
        </div>
    </div>
    <p class="is-centered"><a href="/news/" class="button is-primary is-rounded is-caps" style="margin-bottom: 35px;">Read all news</a></p>
</div>
<?php } ?>
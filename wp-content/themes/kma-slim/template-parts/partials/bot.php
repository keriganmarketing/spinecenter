<?php

use Includes\Modules\Social\SocialSettingsPage;

/**
 * @package KMA
 * @subpackage kmaslim
 * @since 1.0
 * @version 1.2
 */
?>

<footer class="sticky-footer" :class="{stuck: footerStuck}">
    <div class="section-wrapper enews-signup">
        <?php include(locate_template('template-parts/partials/enews-signup.php')); ?>
    </div><!--.enews-signup-->
    <div id="bot">
        <div class="section-wrapper footer-menu">
            <div class="container">
                <div class="columns is-multiline is-justified">
                    <div class="column is-6-tablet is-3-desktop is-3-fullhd">
                        <?php getPageChildren('Spine Procedures'); ?>
                    </div>
                    <div class="column is-6-tablet is-3-desktop is-3-fullhd">
                        <?php getPageChildren('Our Team', 'physician'); ?>
                    </div>
                    <div class="column is-6-tablet is-3-desktop is-3-fullhd">
                        <?php getPageChildren('Patient Center'); ?>
                    </div>
                    <div class="column is-6-tablet is-3-desktop is-3-fullhd">
                        <?php getPageChildren('Education Resources'); ?>
                        <?php getPageChildren('Referring Physicians'); ?>
                        <?php getPageChildren('News'); ?>
                        <?php getPageChildren('Locations'); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="section-wrapper footer-logo">
            <h2 class="line-left line-right light">
                <span class="line"></span>
                <img class="bot-footer-watermark" src="<?php echo get_template_directory_uri() . '/img/logo-white.png'; ?>"
                     alt="">
                <span class="line"></span>
            </h2>
        </div>
        <div class="section-wrapper social-media">
            <div class="social">
                <?php
                $social      = new SocialSettingsPage();
                $socialLinks = $social->getSocialLinks('svg', 'circle');
                if (is_array($socialLinks)) {
                    foreach ($socialLinks as $socialId => $socialLink) {
                        echo '<a class="' . $socialId . '" href="' . $socialLink[0] . '" target="_blank" >' . $socialLink[1] . '</a>';
                    }
                }
                ?>
            </div>
        </div>
        <div class="section-wrapper footer-contact has-text-centered">
            <p class="is-large is-bold"><a class="footer-tel-link" href="tel:1-833-SPINEBR">1-833-SPINEBR</a></p>
            <p class="is-bold"><a class="footer-tel-link" href="tel:1-833-774-6327">(1-833-774-6327)</a></p>
            <p class="footer-email-link"><a href="mailto:info@spinecenterbr.com">info@spinecenterbr.com</a></p>
        </div>
        <div class="section-wrapper locations">
            <?php include(locate_template('template-parts/partials/footer-locations.php')); ?>
        </div>
    </div><!--#bot-->
    <div id="bot-bot">
        <div class="container">
            <div class="section-wrapper">
                <div class="copyright-section">
                    <p id="copyright">&copy; <?php echo date('Y'); ?> <?php echo get_bloginfo(); ?>.
                        All&nbsp;rights&nbsp;reserved. <a href="/about/privacy-policy/">PrivacyPolicy</a>
                        <span id="siteby"><svg version="1.1" id="kma"
                                               xmlns="http://www.w3.org/2000/svg"
                                               xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                                               y="0px" height="14" width="20" viewBox="0 0 12.5 8.7"
                                               style="enable-background:new 0 0 12.5 8.7;"
                                               xml:space="preserve">
                            <path class="kma" fill="#b4be35" d="M6.4,0.1c0,0,0.1,0.3,0.2,0.9c1,3,3,5.6,5.7,7.2l-0.1,0.5c0,0-0.4-0.2-1-0.4C7.7,7,3.7,7,0.2,8.5L0.1,8.1
                        c2.8-1.5,4.8-4.2,5.7-7.2C6,0.4,6.1,0.1,6.1,0.1H6.4L6.4,0.1z"></path></svg> Site by <a
                                    href="https://keriganmarketing.com"
                                    target="_blank">KMA</a>.</span>
                    </p>
                    <p class="help non-discriminatory-notice">Bone & Joint Clinic of Baton Rouge, Inc. complies
                        with applicable Federal civil rights laws and does not discriminate on the basis of
                        race, color, national origin, age, disability or sex. <a class="non-discriminatory-link"
                                href="/wp-content/uploads/2018/04/nondiscrimination-notice_2016.pdf">Click&nbsp;to&nbsp;view&nbsp;our&nbsp;notice</a>.
                    </p>
                </div>
            </div>
        </div>
    </div><!--#bot-bot-->
</footer><!--.sticky-footer-->
<video-modal></video-modal>
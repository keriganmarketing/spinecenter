<?php
/**
 * @package KMA
 * @subpackage kmaslim
 * @since 1.0
 * @version 1.2
 */
$photo = $physician['photo'] != '' ? $physician['photo'] : 'http://bulma.io/images/placeholders/256x256.png';
$specialties = $physician['specialties'] != '' ? explode('<br />', nl2br($physician['specialties'])) : [];
?>
<div class="mini-physician-thumb is-centered">

    <figure class="image">
        <a href="<?php echo $physician['link']; ?>" >
        <img src="<?php echo $photo; ?>" alt="<?php echo $physician['name']; ?> | Spine Expert" title="<?php echo $physician['name']; ?>">
        </a>
    </figure>

    <p class="physician-name"><?php echo $physician['name']; ?></p>
    <?php if($physician['appointments']){ ?>
    <p class="physician-link"><a href="/patient-center/appointments/?requested_physician=<?php echo $physician['slug']; ?>" >Request an appointment</a></p>
    <?php } ?>

</div>

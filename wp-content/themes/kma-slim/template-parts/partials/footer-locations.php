<?php

use Includes\Modules\Locations\Locations;

/**
 * @package KMA
 * @subpackage kmaslim
 * @since 1.0
 * @version 1.2
 */
?>
<div class="container">
    <div class="columns is-multiline is-justified is-aligned">
        <?php $locations = new Locations();
        foreach ($locations->getLocations() as $location) { ?>
            <div class="location column is-narrow">
                <h3><?php echo $location['name']; ?></h3>
                <p class="address"><?php echo nl2br($location['address']); ?></p>
            </div>
        <?php } ?>
        <div class="location column is-narrow hospital-logo">
            <img src="<?php echo get_template_directory_uri() . '/img/spine-hospital-of-louisiana.png'; ?>"
                 alt="" class="footer-watermark">
        </div>
    </div>
</div>

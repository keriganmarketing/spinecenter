<?php

?>
<div class="container has-text-centered" >
    <h2 class="title line-right line-left light" ><span class="line" ></span>&nbsp;Video Gallery&nbsp;<span class="line" ></span></h2>
    <p class="subtitle is-white">Our surgeons explain minimally invasive procedures.</p>
    <div class="columns is-justified" >
        <div class="column is-6 has-text-right" @click="$emit('toggleModal', 'youtube', 'Jb2GQQdvjJ4')" >
            <a class="image-link" >
            <img class="video" src="<?php echo get_template_directory_uri() . '/img/mccarthy-video.jpg'; ?>">
            </a>
            <a class="video-button button is-rounded is-primary is-glass" >PLAY&nbsp;<i class="fa fa-play" aria-hidden="true"></i></a></a>
        </div>
        <div class="column is-6 has-text-right" @click="$emit('toggleModal', 'youtube', 'KwLT2NH0_Uk')" >
            <a class="image-link" >
                <img class="video" src="<?php echo get_template_directory_uri() . '/img/harrod-video.jpg'; ?>">
            </a>
            <a class="video-button button is-rounded is-primary is-glass" >PLAY&nbsp;<i class="fa fa-play" aria-hidden="true"></i></a></a>
        </div>
    </div>
    <a href="/education-resources/videos-interviews/" class="button is-white is-outlined is-rounded is-caps" >Watch more helpful videos</a>
</div>
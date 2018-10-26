<?php
use Includes\Modules\Videos\Videos;

$videoModule = new Videos();
$mccarthyVideo = $videoModule->getVideos([], 'dr-kevin-mccarthy', 'video_author');
$mccarthyVideo = $mccarthyVideo[0];
$harrodVideo = $videoModule->getVideos([], 'dr-c-chambliss-harrod', 'video_author');
$harrodVideo = $harrodVideo[0];
$neumannVideo = $videoModule->getVideos([], 'dr-matthew-a-neumann', 'video_author');
$neumannVideo = $neumannVideo[0];
?>
<div class="container has-text-centered" >
    <h2 class="title line-right line-left light" ><span class="line" ></span>&nbsp;Video Gallery&nbsp;<span class="line" ></span></h2>
    <p class="subtitle is-white">Our surgeons explain minimally invasive procedures.</p>
    <div class="columns is-justified is-multiline" >
        <div class="column is-12-tablet is-4-desktop has-text-right" @click="$emit('toggleModal', '<?php echo $mccarthyVideo['video_type']; ?>', '<?php echo $mccarthyVideo['video_code']; ?>')" >
            <a class="image-link" >
                <img 
                    class="video" 
                    src="<?php echo ($mccarthyVideo['photo'] == '' ? 'https://i.ytimg.com/vi/' . $mccarthyVideo['video_code'] . '/0.jpg' : $mccarthyVideo['photo']); ?>"
                    alt="Best Surgeon for the spine in Baton Rouge" 
                >
            </a>

            <a class="video-button button is-rounded is-primary is-glass" >PLAY&nbsp;<i class="fa fa-play" aria-hidden="true"></i></a></a>

            <p class="thumbnail-text">
                <span class="video-title">Laser Spine Surgery</span>
                <span class="doc-name">Kevin P. McCarthy, M.D.</span>
                <span class="doc-title small">Spine Surgeon</span>
            </p>
            
        </div>
        <div class="column is-6-tablet is-4-desktop has-text-right" @click="$emit('toggleModal', '<?php echo $harrodVideo['video_type']; ?>', '<?php echo $harrodVideo['video_code']; ?>')" >
            <a class="image-link" >
                <img 
                    class="video" 
                    src="<?php echo ($harrodVideo['photo'] == '' ? 'https://i.ytimg.com/vi/' . $harrodVideo['video_code'] . '/0.jpg' : $harrodVideo['photo']); ?>"
                    alt="Minimally invasive spinal fusion surgery in Baton Rouge"
                >
            </a>

            <a class="video-button button is-rounded is-primary is-glass" >PLAY&nbsp;<i class="fa fa-play" aria-hidden="true"></i></a></a>

            <p class="thumbnail-text">
                <span class="video-title">Lumbar Fusion Surgery</span>
                <span class="doc-name">Chambliss Harrod, M.D.</span>
                <span class="doc-title small">Spine Surgeon</span>
            </p>
            
        </div>
        <div class="column is-6-tablet is-4-desktop has-text-right" @click="$emit('toggleModal', '<?php echo $neumannVideo['video_type']; ?>', '<?php echo $neumannVideo['video_code']; ?>')" >
            <a class="image-link" >
                <img 
                    class="video" 
                    src="<?php echo ($neumannVideo['photo'] == '' ? 'https://i.ytimg.com/vi/' . $neumannVideo['video_code'] . '/0.jpg' : $neumannVideo['photo']); ?>"
                    alt="Best spinal expert in Baton Rouge"
                >
            </a>

            <a class="video-button button is-rounded is-primary is-glass" >PLAY&nbsp;<i class="fa fa-play" aria-hidden="true"></i></a></a>

            <p class="thumbnail-text">
                <span class="video-title">Epidural Steroid Injection</span>
                <span class="doc-name">Matthew Neumann, M.D.</span>
                <span class="doc-title small">Interventional Pain Management Physician</span>
            </p>
            
        </div>
    </div>
    <a href="/education-resources/videos-interviews/" class="button is-white is-outlined is-rounded is-caps" >Watch more helpful videos</a>
</div>
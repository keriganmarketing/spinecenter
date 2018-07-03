<template>
    <div>
        <div class="is-hidden-mobile">
            <iframe id="iframe" :src="src" style="width:100%; height:800px;"></iframe>
        </div>
        <div class="is-hidden-tablet">
            <p>For the best mobile experience, click below to open our interactive model viewer.</p>
            <a class="button is-primary is-caps is-round" :href="src" target="_blank" >Open the library</a>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['src'],

        methods: {
            resize(){
                let iFrameID = document.getElementById('iframe');
                if(iFrameID) {
                    // here you can make the height, delete it first, then make it again
                    iFrameID.height = "";
                    iFrameID.height = iFrameID.contentWindow.document.body.scrollHeight + "px";
                }  

                console.log(iFrameID);
            }
        }
    }
</script>
<template>
    <div class="modal is-large is-active" v-if="this.$parent.modalOpen != ''">
        <div class="modal-background" @click="toggleModal"></div>
        <div class="modal-content large">
            <div class="video-wrapper" v-html="content"></div>
        </div>
        <button class="modal-close is-large" @click="toggleModal"></button>
    </div>
</template>

<script>
    export default {

        data() {
            return {
                showModal: false,
                embedContent: ''
            }
        },
        computed: {
            content() {
                return this.$parent.modalContent;
            }
        },
        methods: {
            toggleModal() {
                this.showModal = !this.showModal;
                if (this.$parent.modalOpen !== '') {
                    this.$parent.modalOpen = ''
                }
            }
        },

        mounted() {

            this.$parent.$on('toggleModal', function (modal, code) {
                this.modalOpen = modal;
                if (this.modalOpen === 'youtube') {
                    this.modalContent = '<iframe class="embed-content" src="https://www.youtube-nocookie.com/embed/' + code + '?rel=0&amp;showinfo=0&amp;autoplay=1" frameborder="0" allowfullscreen="allowfullscreen" ></iframe>';
                }
                if (this.modalOpen === 'viewmedica') {

                    this.modalContent = '<div class="embed-content" id="' + code + '" ></div>';

                    client   = "4725";
                    openthis = code;
                    width    = 720;
                    vm_open();

                }
            });

        },

        created() {
            let vm = document.createElement('script');
            vm.type = 'text/javascript';
            vm.src = 'https://swarminteractive.com/js/vm.js';
            document.getElementsByTagName('head')[0].appendChild(vm);
        }

    }
</script>
<template lang="pug">
    section.d-flex.flex-shrink-0.section-py-80.section-min-h-100
        b-container(fluid)
            b-row.section-min-h-100
                b-col.col-lg-12.d-flex.justify-content-center.align-items-center
                    b-button(size="sm" variant="primary" class="mx-2" v-b-modal.modal-basic)
                        | Modal Basic
                    b-button(size="sm" variant="success" class="mx-2" v-b-modal.modal-video)
                        | Secondary
        b-modal(id="modal-basic" title="BootstrapVue")
            p.my-4
                | Hello from modal!
        b-modal(id="modal-video" size="lg" title="BootstrapVue" hide-header hide-footer dialog-class="modal-dialog-centered" modal-class="modal-video")
            //- .modal-video-close(@click="$bvModal.hide('modal-video')")
            template(slot="default")
                b-embed(type="iframe" aspect="16by9" src="https://www.youtube.com/embed/jsQ7yKwDPZk?rel=0" allowfullscreen)
            //- template(slot="modal-backdrop")
                //- .bg-success
</template>

<script>
    export default {
        name: "Modal"
    };
</script>

<style lang="scss">
.modal-video {
    .modal-content {
        border: none;
        border-radius: 0;
    }
    .modal-body {
        padding: 0;
    }
    // &-close {
    //     border: 10px solid red;
    // }
}
</style>

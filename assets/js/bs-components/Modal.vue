<template lang="pug">
    section.d-flex.flex-shrink-0.section-py-80.section-min-h-100
        b-container(fluid)
            b-row.section-min-h-100
                b-col.col-lg-12.d-flex.justify-content-center.align-items-center
                    b-button(size="lg" variant="emerald" class="mx-2" v-b-modal.modal-basic pill)
                        | Modal Basic
                    b-button(size="lg" variant="outline-wet-asphalt" class="mx-2" v-b-modal.modal-video pill)
                        | Modal Video
        b-modal(id="modal-basic" title="BootstrapVue")
            p.my-4
                | Hello from modal!
        b-modal(id="modal-video" size="lg" title="BootstrapVue" hide-header hide-footer dialog-class="modal-dialog-centered" modal-class="modal-video")
            .modal-video-close(@click="$bvModal.hide('modal-video')")
                i.fas.fa-times
            template(slot="default")
                b-embed(type="iframe" aspect="16by9" src="https://www.youtube.com/embed/jsQ7yKwDPZk?rel=0" allowfullscreen)
            template(slot="modal-backdrop")
                .modal-video-backdrop
</template>

<script>
    export default {
        name: "Modal"
    };
</script>

<style lang="scss">
@import '../../css/variables/color.scss';
.modal-video {
    .modal-dialog {
        // padding: 50px 0;
    }
    .modal-content {
        border: none;
        border-radius: 0;
    }
    .modal-body {
        padding: 0;
    }
    &-close {
        width: 30px;
        height: 30px;
        position: absolute;
        right: -40px;
        font-size: 2rem;
        opacity: .75;
        cursor: pointer;
        transition: opacity 0.15s ease-in-out;
        @media (max-width: 767px) {
            top: -40px;
            right: 0;
        }
        &:hover,
        &:focus {
            opacity: 1;
        }
        i {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: #fff;
        }
    }
    &-backdrop {
        background-color: $wet-asphalt-900;
        width: 100%;
        height: 100%;
    }
}
</style>

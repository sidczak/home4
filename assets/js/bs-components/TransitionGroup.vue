<template lang="pug">
    section.d-flex.flex-shrink-0.section-py-80.section-min-h-100
        b-container(fluid)
            b-row.section-min-h-100
                b-col.col-lg-12.d-flex.justify-content-center.align-items-center
                    div
                        b-row
                            b-col.text-center
                                h3 Fade
                                transition(name="fade")
                                    b-button(v-if="fade" size="lg" variant="emerald" class="mx-2" pill key="save" @click="fade = !fade")
                                        | Fade
                                    b-button(v-else size="lg" variant="turquoise" class="mx-2" pill key="edit" @click="fade = !fade")
                                        | Edit
                        b-row
                            b-col.text-center
                                h3 Fade
                                transition(name="fadex" mode="in-out")
                                    b-button(v-if="fade" size="lg" variant="emerald" class="mx-2" pill key="save" @click="fade = !fade")
                                        | Fade
                                    b-button(v-else size="lg" variant="turquoise" class="mx-2" pill key="edit" @click="fade = !fade")
                                        | Edit
</template>

<script>
export default {
    name: "TransitionGroup",
    data () {
        return {
            fade: true
        }
    }
};
</script>

<style lang="scss">
@import '../../css/variables/color.scss';
.btn {
    width: 200px;
}
.fade {
    &-leave-active,
    &-enter-active {
        transition: all .5s ease-in-out;
    }
    &-enter {
        transform: translateX(200px);
    }
    &-leave-active {
        transform: translateX(-200px);
        position: absolute;
    }
    &-enter,
    &-leave-to {
        opacity: 0;
    }
}
.fadex {
    &-leave-active,
    &-enter-active {
        transition: all .5s ease-in-out;
        position: absolute;   
    }
    &-enter {
        transform: translateX(200px);
        position: absolute;
    }
    &-leave-active {
        transform: translateX(-200px);
    }
    &-enter,
    &-leave-to {
        opacity: 0;
    }
}
</style>

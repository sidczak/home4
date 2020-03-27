<template lang="pug">
    section.d-flex.flex-shrink-0.section-py-80.section-min-h-100
        b-container(fluid)
            b-row.section-min-h-100
                b-col.col-lg-12.d-flex.justify-content-center.align-items-center
                    div
                        b-row
                            b-col
                                b-button(size="lg" variant="emerald" class="mx-2" pill @click="show = !show")
                                    | Transition Basic
                                transition(name="fade" mode="in-out")
                                    p(v-if="show")
                                        | Hello
                        b-row
                            b-col.text-center
                                h3 Fade
                                transition(name="fade" mode="out-in")
                                    b-button(size="lg" variant="emerald" class="mx-2" pill v-if="fade" key="save" @click="fade = !fade")
                                        | Fade
                                    b-button(size="lg" variant="turquoise" class="mx-2" pill v-else key="edit" @click="fade = !fade")
                                        | Edit
                        b-row
                            b-col.text-center
                                h3 Slide fade
                                transition(name="slide-fade" mode="out-in")
                                    b-button(v-if="slideFade" size="lg" variant="emerald" pill key="save" @click="slideFade = !slideFade")
                                        | Slide fade
                                    b-button(v-else size="lg" variant="turquoise" pill key="edit" @click="slideFade = !slideFade")
                                        | Edit
                        b-row
                            b-col.text-center
                                h3 Bounce
                                transition(name="bounce" mode="out-in")
                                    b-button(size="lg" variant="emerald" class="mx-2" pill key="save" @click="bounce = !bounce" v-if="bounce")
                                        | Bounce
                                    b-button(size="lg" variant="turquoise" class="mx-2" pill key="edit" @click="bounce = !bounce" v-else)
                                        | Edit
</template>

<script>
export default {
    name: "Transitions",
    data () {
        return {
            show: true,
            fade: true,
            slideFade: true,
            bounce: true
        }
    }
};
</script>

<style lang="scss">
@import '../../css/variables/color.scss';
.fade {
    &-enter-active,
    &-leave-active {
        transition: opacity .5s;
    }
    &-enter,
    &-leave-to {
        opacity: 0;
    }
}
.slide-fade {
    &-leave-active,
    &-enter-active {
        transition: all .8s ease-in-out;
    }
    &-enter,
    &-leave-to {
        opacity: 0;
    }
    &-enter {
        transform: translateX(100px);
    }
    &-leave-to {
        transform: translateX(-100px);
    }
}
.bounce {
    &-enter-active {
        animation: bounce-in .5s;
    }
    &-leave-active {
        animation: bounce-in .5s reverse;
    }
}
@keyframes bounce-in {
    0% {
        transform: scale(0);
    }
    50% {
        transform: scale(1.5);
    }
    100% {
        transform: scale(1);
    }
}
</style>

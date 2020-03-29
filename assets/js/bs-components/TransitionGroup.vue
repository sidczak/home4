<template lang="pug">
    section.d-flex.flex-shrink-0.section-py-80.section-min-h-100
        b-container(fluid)
            b-row.section-min-h-100
                b-col.col-lg-12.d-flex.justify-content-center.align-items-center
                    div
                        b-row
                            b-col.text-center
                                b-button(size="lg" variant="emerald" class="mx-2" pill @click="show = !show")
                                    | Transition Basic
                                transition(name="fade" mode="in-out")
                                    p(v-if="show")
                                        | Hello
</template>

<script>
export default {
    name: "TransitionGroup",
    data () {
        return {
            show: true,
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
</style>

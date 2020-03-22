<template lang="pug">
    section.d-flex.flex-shrink-0.section-py-80.section-min-h-100
        b-container(fluid)
            b-row.section-min-h-100
                b-col.col-lg-12.d-flex.justify-content-center.align-items-center
                    div
                        b-row
                            b-col
                                b-button(size="lg" variant="emerald" class="mx-2" pill @click="show = !show")
                                    | Modal Basic
                                //- transition(name="fade")
                                //-     p(v-if="show")
                                //-         | Hello
                        //- b-row
                        //-     b-col
                        //-         transition
                        //-             b-button(size="lg" variant="emerald" class="mx-2" pill @key="show = !show")
                        //-                 | {{ show ? 'Save' : 'Edit' }}
                        //- b-row
                        //-     b-col
                        //-         transition(name="fade" mode="out-in")
                        //-             b-button(size="lg" variant="emerald" class="mx-2" pill v-if="show" key="save")
                        //-                 | Save
                        //-             b-button(size="lg" variant="turquoise" class="mx-2" pill v-else key="edit")
                        //-                 | Edit
                        //- b-row
                        //-     b-col
                        //-         transition(name="fade")
                        //-             b-button(size="lg" variant="emerald" class="mx-2" pill v-if="show" key="save")
                        //-                 | Save
                        //-             b-button(size="lg" variant="turquoise" class="mx-2" pill v-else key="edit")
                        //-                 | Edit
                        b-row
                            b-col(class="xxx")
                                transition(name="slide-fade" mode="in-out")
                                    b-button(size="lg" variant="emerald" class="mx-2" pill v-if="show" key="save")
                                        | Save
                                    b-button(size="lg" variant="turquoise" class="mx-2" pill v-else key="edit")
                                        | Edit
                        //- b-row
                        //-     b-col
                        //-         transition(name="bounce" mode="out-in")
                        //-             b-button(size="lg" variant="emerald" class="mx-2" pill v-if="show" key="save")
                        //-                 | Save
                        //-             b-button(size="lg" variant="turquoise" class="mx-2" pill v-else key="edit")
                        //-                 | Edit
</template>

<script>
    export default {
        name: "Transitions",
        data () {
            return {
                show: true,
                isEditing: true
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
.xxx .btn {
    position: absolute;
}
.slide-fade {
    &-enter-active {
        transition: all .8s cubic-bezier(1.0, 0.5, 0.8, 1.0);
    }
    &-leave-active {
        transition: all .8s cubic-bezier(1.0, 0.5, 0.8, 1.0);
    }
    &-enter {
        transform: translateY(80px);
        opacity: 0;
    }
    &-leave-to {
        transform: translateY(-80px);
        opacity: 0;
    }
}
.bounce-enter-active {
    animation: bounce-in .5s;
}
.bounce-leave-active {
    animation: bounce-in .5s reverse;
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

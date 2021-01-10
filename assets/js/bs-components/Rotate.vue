<template lang="pug">
    section.d-flex.flex-shrink-0.section-py-80.section-min-h-100
        b-container(fluid)
            b-row.section-min-h-100(align-v="center" align-h="center")
                b-col.card-container.d-flex.align-items-center.justify-content-center(md="6")
                    transition(name="rotate")
                        b-card.bg-clouds-concave-145.shadow-clouds.card-front.border-0(v-if="rotate" key="card-front" @click="rotate = !rotate")
                            b-card-text
                                | Some quick example text to build on the card title and make up the bulk of the card's content.
                            b-button(variant="turquoise")
                                | Go somewhere
                        b-card.bg-turquoise-concave-145.shadow-clouds.card-back.border-0(v-else key="card-back" @click="rotate = !rotate")
                            b-card-text.text-white
                                | Some quick example text to build on the card title and make up the bulk of the card's content. Some quick example text to build on the card title and make up the bulk of the card's content. Some quick example text to build on the card title and make up the bulk of the card's content. Some quick example text to build on the card title and make up the bulk of the card's content.
                            b-button(variant="clouds" pill)
                                | Go somewhere
</template>

<script>
export default {
    name: "Rotate",
    data () {
        return {
            rotate: true,
            animated: true,
        }
    }
};
</script>

<style lang="scss" scoped>
.card {
    //&-body // width: 300px - usztywnić żeby tekst nie skakał
    &-container {
        perspective: 1200px;
        min-height: 400px;
    }
    &-front,
    &-back {
        backface-visibility: hidden;
    }
}
.rotate {
    &-leave-active,
    &-enter-active {
        transition: all .5s ease-in-out;
    }
    &-enter {
        transform: rotateY(-180deg);
    }
    &-leave-active {
        transform: rotateY(-180deg);
        position: absolute;
    }
    &-enter,
    &-leave-to {
        opacity: 0;
    }
}
</style>

<template lang="pug">
    section.d-flex.flex-shrink-0.section-min-h-100
        b-container(fluid)
            b-row.section-py-80.section-min-h-100.card-waves(align-v="center" align-h="center" :class="{ 'bg-turquoise': turquoise, 'bg-orange': orange, 'bg-alizarin': alizarin, 'bg-peter-river': peterRiver, 'bg-clouds': !turquoise && !orange && !alizarin && !peterRiver}")
                b-col(lg="8")
                    b-row.text-center
                        b-col(lg="6")
                            b-button(size="lg" variant="outline-wet-asphalt" pill)
                                | Card button
                        b-col(lg="6")
                            b-button(size="lg" variant="outline-wet-asphalt" pill)
                                | Card button
                    b-row
                        b-col.my-3(lg="6")
                            b-card.border-0(title="Card Title" @mouseover="turquoise = true" @mouseleave="turquoise = false" :class="[turquoise ? 'bg-turquoise-concave-145' : 'bg-clouds-concave-145', {'shadow-turquoise-concave-145': turquoise, 'shadow-orange-concave-145': orange, 'shadow-alizarin-concave-145': alizarin, 'shadow-peter-river-concave-145': peterRiver, 'shadow-clouds-concave-145': !turquoise && !orange && !alizarin && !peterRiver}]")
                                .card-curtain
                                b-card-text
                                    | With supporting text below as a natural lead-in to additional content.
                        b-col.my-3(lg="6")
                            b-card.border-0(title="Card Title" @mouseover="orange = true" @mouseleave="orange = false" :class="[orange ? 'bg-orange-concave-225' : 'bg-clouds-concave-225', {'shadow-turquoise-concave-225': turquoise, 'shadow-orange-concave-225': orange, 'shadow-alizarin-concave-225': alizarin, 'shadow-peter-river-concave-225': peterRiver, 'shadow-clouds-concave-225': !turquoise && !orange && !alizarin && !peterRiver}]")
                                b-card-text
                                    | With supporting text below as a natural lead-in to additional content.
                        b-col.my-3(lg="6")
                            b-card.border-0(title="Card Title" @mouseover="alizarin = true" @mouseleave="alizarin = false" :class="[alizarin ? 'bg-alizarin-concave-45' : 'bg-clouds-concave-45', {'shadow-turquoise-concave-45': turquoise, 'shadow-orange-concave-45': orange, 'shadow-alizarin-concave-45': alizarin, 'shadow-peter-river-concave-45': peterRiver, 'shadow-clouds-concave-45': !turquoise && !orange && !alizarin && !peterRiver}]")
                                b-card-text
                                    | With supporting text below as a natural lead-in to additional content.
                        b-col.my-3(lg="6")
                            b-card.border-0(title="Card Title" @mouseover="peterRiver = true" @mouseleave="peterRiver = false" :class="[peterRiver ? 'bg-peter-river-concave-315' : 'bg-clouds-concave-315', {'shadow-turquoise-concave-315': turquoise, 'shadow-orange-concave-315': orange, 'shadow-alizarin-concave-315': alizarin, 'shadow-peter-river-concave-315': peterRiver, 'shadow-clouds-concave-315': !turquoise && !orange && !alizarin && !peterRiver}]")
                                b-card-text
                                    | With supporting text below as a natural lead-in to additional content.
</template>

<script>
export default {
    name: "Waves",
    data () {
        return {
            turquoise: false,
            orange: false,
            alizarin: false,
            peterRiver: false
        }
    }
};
</script>

<style lang="scss" scoped>
.card {
    overflow: hidden;
    transition: all .3s ease-in-out;
    &:hover {
        color: #fff;
    }
    &-waves {
        transition: all .3s ease-in-out;
    }
    &-curtain {
        position: absolute;
        // border: 1px solid red;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }
}
</style>
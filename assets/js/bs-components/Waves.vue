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
                            b-card.border-0(title="Card Title" @mouseover="turquoise = true" @mouseleave="turquoise = false" :class="[turquoise ? 'shadow-turquoise-concave-145' : 'shadow-clouds-concave-145', {'shadow-turquoise': turquoise, 'shadow-orange': orange, 'shadow-alizarin': alizarin, 'shadow-peter-river': peterRiver}]")
                                .card-curtain
                                b-card-text
                                    | With supporting text below as a natural lead-in to additional content.
                        b-col.my-3(lg="6")
                            b-card.border-0(title="Card Title" @mouseover="orange = true" @mouseleave="orange = false" :class="[orange ? 'shadow-orange-concave-225' : 'shadow-clouds-concave-225', {'shadow-turquoise': turquoise, 'shadow-orange': orange, 'shadow-alizarin': alizarin, 'shadow-peter-river': peterRiver}]")
                                b-card-text
                                    | With supporting text below as a natural lead-in to additional content.
                        b-col.my-3(lg="6")
                            b-card.border-0(title="Card Title" @mouseover="alizarin = true" @mouseleave="alizarin = false" :class="[alizarin ? 'shadow-alizarin-concave-45' : 'shadow-clouds-concave-45', {'shadow-turquoise': turquoise, 'shadow-orange': orange, 'shadow-alizarin': alizarin, 'shadow-peter-river': peterRiver}]")
                                b-card-text
                                    | With supporting text below as a natural lead-in to additional content.
                        b-col.my-3(lg="6")
                            b-card.border-0(title="Card Title" @mouseover="peterRiver = true" @mouseleave="peterRiver = false" :class="[peterRiver ? 'shadow-peter-river-concave-315' : 'shadow-clouds-concave-315', {'shadow-turquoise': turquoise, 'shadow-orange': orange, 'shadow-alizarin': alizarin, 'shadow-peter-river': peterRiver}]")
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
        border: 1px solid red;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }
}
</style>
<template lang="pug">
    section.d-flex.flex-shrink-0.section-min-h-100
        b-container(fluid)
            b-row.section-py-80.section-min-h-100.align-items-center.bg-clouds
                b-col
                    b-row
                        b-col.my-3(lg="6")
                            b-card.border-0(title="Card Title" @mouseover="hover = true" @mouseleave="hover = false" :class="hover ? 'shadow-turquoise-concave-145 shadow-clouds' : 'shadow-clouds-concave-145'")
                                b-card-text
                                    | With supporting text below as a natural lead-in to additional content.
                        b-col.my-3(lg="6")
                            b-card.border-0(title="Card Title" @mouseover="hoverOrange = true" @mouseleave="hoverOrange = false" :class="hoverOrange ? 'shadow-orange-concave-145 shadow-clouds' : 'shadow-clouds-concave-145'")
                                b-card-text
                                    | With supporting text below as a natural lead-in to additional content.
                        //- b-col.my-3(lg="6")
                        //-     b-card.shadow-clouds-concave-225.border-0(title="Card Title" @mouseover="mouseover" @mouseleave="mouseleave")
                        //-         b-card-text
                        //-             | With supporting text below as a natural lead-in to additional content.
                        //- b-col.my-3(lg="6")
                        //-     b-card.shadow-clouds-concave-45.border-0(title="Card Title" @mouseover="mouseover" @mouseleave="mouseleave")
                        //-         b-card-text
                        //-             | With supporting text below as a natural lead-in to additional content.
                        //- b-col.my-3(lg="6")
                        //-     //- b-card.shadow-turquoise-concave-315.border-0(text-variant="white" title="Card Title")
                        //-     b-card.shadow-clouds-concave-315.border-0(title="Card Title" @mouseover="mouseover" @mouseleave="mouseleave")
                        //-         b-card-text
                        //-             | With supporting text below as a natural lead-in to additional content.
</template>

<script>
export default {
    name: "Waves",
    data () {
        return {
            hover: false,
            hoverOrange:false
        }
    }
};
</script>

<style lang="scss" scoped>
    </style>
<template lang="pug">
    //- https://codepen.io/anzk/pen/JqevGb
    section.d-flex.flex-shrink-0.section-py-80.section-min-h-100
        b-container(fluid)
            .slider
                transition-group(tag="div" :name="transitionName" class="slides-group")
                    div(v-if="show" :key="current" class="slide" :class="slides[current].className")
                        p I'm {{slides[current].className}}!
                div(class="btn btn-prev" aria-label="Previous slide" @click="slide(-1)")
                    | &#10094;
                div(class="btn btn-next" aria-label="Next slide" @click="slide(1)")
                    | &#10095;

</template>

<script>
    export default {
        name: "Slider",
        data () {
            return {
                current: 0,
                direction: 1,
                transitionName: "fade",
                show: false,
                slides: [
                    { className: "blue" },
                    { className: "red" },
                    { className: "yellow" }
                ]
            }
        },
        mounted() {
            this.show = true;
        },
        methods: {
            slide(dir) {
                this.direction = dir;
                dir === 1
                    ? (this.transitionName = "slide-next")
                    : (this.transitionName = "slide-prev");
                var len = this.slides.length;
                this.current = (this.current + dir % len + len) % len;
            }
        }
    };
</script>

<style lang="scss" scoped>
@import '../../css/variables/color.scss';
.slider {

}
</style>

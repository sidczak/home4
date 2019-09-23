<template lang="pug">
    section.d-flex.align-items-center.section-py-80.section-min-h-100
        b-container
            b-row.text-center(v-for="n in 1" :key="n.id")
                b-col
                    h1.mb-0 Your Window:<br/> Width: {{ window.width }}, Height: {{ window.height }}
</template>
<script>
    export default {
        name: "Scroll",
        data () {
            return {
                window: {
                    width: 0,
                    height: 0
                }
            }
        },
        mounted() {
            window.addEventListener('resize', this.handleResize)
            this.handleResize();
        },
        destroyed() {
            window.removeEventListener('resize', this.handleResize)
        },
        methods: {
            handleResize() {
                this.window.width = window.innerWidth;
                this.window.height = window.innerHeight;
            }
        }
    };
</script>
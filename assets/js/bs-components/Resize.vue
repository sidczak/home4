<template>
    <section class="section has-text-centered">
        <h1 class="title is-1">
            Your Window
        </h1>
        <h2 class="title is-2">
            Width: {{ window.width }},
            Height: {{ window.height }}
        </h2>
    </section>
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
<style lang="scss" scoped>
section.section {
  height: 100%;
  border: 1px solid red;
}

section.section {
  display: flex;
  flex-flow: column;
  justify-content: center;
  align-items: center;
}
</style>
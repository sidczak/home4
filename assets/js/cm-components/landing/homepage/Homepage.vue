<template lang="pug">
    .homepage
        Hero
        Banner
</template>
<script>
    import Hero from './Hero';
    import Banner from '../webinar-flywheel/Banner';
    
    export default {
        name: "Homepage",
        components: {
            Hero,
            Banner
        },
        props: {
        },
        data () {
            return {
            }
        }
    };
</script>
<style lang="scss">
.homepage {
    overflow: hidden;
}
</style>

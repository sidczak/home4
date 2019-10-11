<template lang="pug">
    .album.section-pt-56
        Jumbotron
        Cards
        Tabs
</template>
<script>
    import Jumbotron from './jumbotron'
    import Cards from './cards'
    import Tabs from './tabs'
    
    export default {
        name: "Album",
        components: {
            Jumbotron,
            Cards,
            Tabs
        },
        props: {
        },
        data () {
            return {
            }
        }
    };
</script>
<style lang="scss" scoped>
.album {
    overflow: hidden;
}
</style>

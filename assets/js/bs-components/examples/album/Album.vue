<template lang="pug">
    .album.section-pt-56
        Jumbotron
        Cards
</template>
<script>
    import Jumbotron from './jumbotron'
    import Cards from './cards'
    
    export default {
        name: "Album",
        components: {
            Jumbotron,
            Cards
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

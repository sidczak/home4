<template lang="pug">
    .album
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

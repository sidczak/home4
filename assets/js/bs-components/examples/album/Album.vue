<template lang="pug">
    .album
        Jumbotron
        Cards
</template>
<script>
    import Jumbotron from './Jumbotron'
    import Cards from './Cards'
    
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

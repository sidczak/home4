<template lang="pug">
    .album
        Jumbotron
</template>
<script>
    import Jumbotron from './Jumbotron'
    
    export default {
        name: "Album",
        components: {
            Jumbotron
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

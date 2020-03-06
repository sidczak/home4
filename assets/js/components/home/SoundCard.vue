<template lang="pug">
div
    //- https://codepen.io/JavaScriptJunkie/pen/qBWrRyg
    //- https://github.com/muhammederdem/mini-player
    b-card
        .card-picture
        b-card-text
            | Some quick example text to build on the card title and make up the bulk of the card's content.
        b-button(href="#" variant="wet-asphalt" class="px-5" size="lg" pill)
            | Play
</template>
<script>    
    export default {
        name: "SoundCard",
        props: {
        },
        data () {
            return {
            }
        }
    };
</script>
<style lang="scss" scoped>
@import '../../../css/variables/color.scss';
.card {
    background-color: $silver-50;
    border: none;
    border-radius: 15px;
    box-shadow: 0px 15px 35px -5px rgba($silver-500, 0.7);
    padding-top: 150px;
    margin-top: 74px;
    z-index: 0;
    &-picture {
        background: url('../../../images/covers/1.jpg') center center no-repeat $silver-100;
        background-size: cover;
        position: absolute;
        width: 200px;
        height: 200px;
        top: -75px;
        left: 50%;
        // transform: translateX(-50%);
        margin-left: -100px;
        border-radius: 15px;
        box-shadow: 0px 10px 40px 0px rgba($silver-900, 0.9);
        &:before {
            background: inherit;
            content: '';
            position: absolute;
            top: 30px;
            width: 100%;
            height: 100%;
            border-radius: 15px;
            box-shadow: 0px 10px 40px 0px rgba($silver-900, 0.9);
            transform: scale(0.9);
            filter: blur(10px);
            opacity: 0.9;
            z-index: -1;
        }
    }
}
</style>
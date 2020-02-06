<template lang="pug">
    b-card
        .card-picture
        b-card-text
            | Some quick example text to build on the card title and make up the bulk of the card's content.
        b-button(href="#" variant="midnight-blue" class="px-5" size="lg" pill)
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
    box-shadow: 0px 15px 35px -5px rgba($silver-500, 0.3);
    padding-top: 150px;
    margin-top: 74px;
    &-picture {
        background: url('../../../images/covers/3.jpg') center center no-repeat $silver-100;
        background-size: cover;
        position: absolute;
        width: 200px;
        height: 200px;
        top: -75px;
        left: 50%;
        transform: translateX(-50%);
        border-radius: 15px;
        box-shadow: 0px 10px 40px 0px rgba($silver-900, 0.9);
        // &:before {
        //     background: inherit;
        //     content: '';
        //     position: absolute;
        //     top: 50px;
        //     width: 100%;
        //     height: 100%;
        //     border-radius: 15px;
        //     box-shadow: 0px 10px 40px 0px rgba($silver-500, 0.5);
        //     transform: scale(0.9);
        //     // filter: blur(10px);
        //     // opacity: 0.9;
        // }
    }
}
</style>
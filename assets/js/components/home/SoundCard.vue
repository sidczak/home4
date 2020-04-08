<template lang="pug">
div
    //- https://codepen.io/JavaScriptJunkie/pen/qBWrRyg
    //- https://github.com/muhammederdem/mini-player
    b-card
        transition(:name="transitionName" appear)
            .card-picture(:class="currentTrack.picture" :key="index" v-if="index === currentTrackIndex" v-for="(track, index) in tracks")
        b-card-text(v-if="currentTrack")
            | {{ currentTrack.name }} - {{ currentTrack.artist }}
        ul.list-inline
            li.list-inline-item(:class="{'favorited': currentTrack.favorited}" @click="favorite")
                i.fas.fa-fw.fa-heart
            li.list-inline-item
                i.fas.fa-fw.fa-play
            li.list-inline-item
                i.fas.fa-fw.fa-pause
            li.list-inline-item(@click="prew")
                i.fas.fa-fw.fa-step-backward
            li.list-inline-item(@click="next")
                i.fas.fa-fw.fa-step-forward
            a.list-inline-item(:href="currentTrack.url" target="_blank")
                i.fas.fa-fw.fa-external-link-alt
        ul.list-unstyled
            li(v-for="(track, index) in tracks" :class="{'active': index === currentTrackIndex}")
                i.fas.fa-fw.fa-caret-right(v-if="index === currentTrackIndex")
                | {{ track.name }} - {{track.artist}}
</template>
<script>    
    export default {
        name: "SoundCard",
        props: {
        },
        data () {
            return {
                transitionName: null,
                tracks: require("../../data/tracks"),
                currentTrack: null,
                currentTrackIndex: 0
            }
        },
        created () {
            this.transitionName = 'card-out';
            this.currentTrack = this.tracks[0]
        },
        methods: {
            next: function () {
                this.transitionName = 'card-out';

                if (this.currentTrackIndex < this.tracks.length - 1) {
                    this.currentTrackIndex++;
                } else {
                    this.currentTrackIndex = 0;
                }
                this.currentTrack = this.tracks[this.currentTrackIndex];
            },
            prew: function () {
                this.transitionName = 'card-in'

                if (this.currentTrackIndex > 0) {
                    this.currentTrackIndex--
                } else {
                    this.currentTrackIndex = this.tracks.length - 1
                }
                this.currentTrack = this.tracks[this.currentTrackIndex]
            },
            favorite() {
                this.tracks[this.currentTrackIndex].favorited = !this.tracks[this.currentTrackIndex].favorited;
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
        &:before,
        &:after {
            background: inherit;
            content: '';
            display: block;
            position: absolute;
            width: 100%;
            height: 100%;
            border-radius: 15px;
        }
        &:before {
            top: 30px;
            transform: scale(0.9);
            filter: blur(10px);
            opacity: 0.9;
            z-index: 1;
        }
        &:after {
            box-shadow: 0px 10px 40px 0px rgba($silver-900, 0.9);
            z-index: 2;
        }
        &.option1 {
            background-image: url('../../../images/covers/1.jpg');
        }
        &.option2 {
            background-image: url('../../../images/covers/2.jpg');
        }
        &.option3 {
            background-image: url('../../../images/covers/3.jpg');
        }
        &.option4 {
            background-image: url('../../../images/covers/4.jpg');
        }
        &.option5 {
            background-image: url('../../../images/covers/5.jpg');
        }
        &.option6 {
            background-image: url('../../../images/covers/6.jpg');
        }
        &.option7 {
            background-image: url('../../../images/covers/7.jpg');
        }
        &.option8 {
            background-image: url('../../../images/covers/8.jpg');
        }
        &.option9 {
            background-image: url('../../../images/covers/9.jpg');
        }
    }
    &-out,
    &-in {
        &-leave-active,
        &-enter-active {
            transition: all .5s ease-in-out;
        }
        &-enter,
        &-leave-to {
            opacity: 0;
        }
    }
    &-out {
        &-enter {
            transform: scale(.5);
        }
        &-leave-to {
            transform: scale(1.5);
        }
    }
    &-in {
        &-enter {
            transform: scale(1.5);
        }
        &-leave-to {
            transform: scale(.5);
        }
    }
    .list-inline {
        background-color: $silver-100;
        padding: 10px;
        text-align: center;
        border-radius: 15px;
        &-item {
            padding: 5px;
            border-radius: 5px;
            transition: all .3s ease-in-out;
            cursor: pointer;
            color: $wet-asphalt;
            &:hover {
                background-color: $wet-asphalt;
                color: #fff;
            }
            &.favorited {
                color: $red;
            }
        }
    }
    .list-unstyled {
        .active {
            background-color: $silver-100;
            transition: all .3s ease-in-out;
        }
    }
}
// .bounce {
//     &-enter-active {
//         animation: bounce-in 1s;
//     }
//     &-leave-active {
//         animation: bounce-in 1s reverse;
//     }
//     &-enter-active,
//     &-leave-active {
//         transition: opacity 1s;
//     }
//     &-enter,
//     &-leave-to {
//         opacity: 0;
//     }
// }
// @keyframes bounce-in {
//     0% {
//         transform: scale(0);
//     }
//     50% {
//         transform: scale(1.5);
//     }
//     100% {
//         transform: scale(1);
//     }
// }
</style>
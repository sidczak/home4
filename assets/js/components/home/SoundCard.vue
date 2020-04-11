<template lang="pug">
div
    //- https://codepen.io/JavaScriptJunkie/pen/qBWrRyg
    //- https://github.com/muhammederdem/mini-player
    b-card(v-if="currentTrack")
        transition(:name="transitionName" appear)
            .card-picture(:class="currentTrack.picture" :key="index" v-if="index === currentTrackIndex" v-for="(track, index) in tracks")
        transition(name="fade" mode="out-in" appear)
            .card-album.text-center(:key="index" v-if="index === currentTrackIndex" v-for="(track, index) in tracks")
                b-card-title(title-tag="h2")
                    | {{ currentTrack.name }}
                b-card-sub-title.mb-2(sub-title-tag="h4")
                    | {{ currentTrack.artist }}
        ul.list-inline
            li.list-inline-item(:class="{'favorited': currentTrack.favorited}" @click="favorite")
                i.fas.fa-fw.fa-heart
            li.list-inline-item(@click="play")
                i.fas.fa-fw.fa-play(v-if="!isPlay")
                i.fas.fa-fw.fa-pause(v-else)
            li.list-inline-item(@click="prew")
                i.fas.fa-fw.fa-step-backward
            li.list-inline-item(@click="next")
                i.fas.fa-fw.fa-step-forward
            a.list-inline-item(:href="currentTrack.url" target="_blank")
                i.fas.fa-fw.fa-external-link-alt
        ul.card-list-track.list-unstyled
            li.card-list-track-item(v-for="(track, index) in tracks" :class="{'active': index === currentTrackIndex}" @click="current(index)")
                i.fas.fa-fw.fa-caret-right
                | {{ track.name }} - {{track.artist}} {{index}} {{currentTrackIndex}}
                transition(v-if="index === currentTrackIndex" name="bounce" mode="out-in" appear)
                    i.fas.fa-fw.fa-play.ml-2(v-if="!isPlay" key="play")
                    i.fas.fa-fw.fa-pause.ml-2(v-else key="pause")
</template>
<script>    
    export default {
        name: "SoundCard",
        props: {
        },
        data () {
            return {
                isPlay: false,
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
            play: function () {
                this.isPlay = !this.isPlay
            },
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
            current: function (index) {
                this.currentTrackIndex = index
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
    &-title {
        color: $wet-asphalt;
    }
    &-subtitle {
        color: $wet-asphalt-400 !important;
    }
    .list-inline {
        background-color: $silver-100;
        padding: 10px;
        text-align: center;
        margin: 0 -1.25rem;
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
    &-list-track {
        overflow: hidden;
        &-item {
            position: relative;
            padding: 5px 0;
            cursor: pointer;
            transition: all .2s ease-in-out;
            &:hover,
            &.active {
                padding-left: 15px;
                color: $turquoise;
                .fa-caret-right {
                    left: -6px;
                    opacity: 1;
                }
            }
            .fa-caret-right {
                position: absolute;
                left: -15px;
                top: 50%;
                transform: translateY(-50%);
                opacity: 0;
                color: $turquoise;
                transition: all .2s ease-in-out;
            }
            .fa-play {
                color: $turquoise;
            }
        }
    }
}
.fade {
    &-enter-active,
    &-leave-active {
        transition: opacity .5s;
    }
    &-enter,
    &-leave-to {
        opacity: 0;
    }
}
.bounce {
    &-enter-active {
        animation: bounce-in .5s;
    }
    &-leave-active {
        animation: bounce-in .5s reverse;
    }
    &-enter-active,
    &-leave-active {
        transition: opacity .5s;
    }
    &-enter,
    &-leave-to {
        opacity: 0;
    }
}
@keyframes bounce-in {
    0% {
        transform: scale(0);
    }
    50% {
        transform: scale(1.5);
    }
    100% {
        transform: scale(1);
    }
}
</style>
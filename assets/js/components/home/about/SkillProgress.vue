<template lang="pug">
.skill-progress.shadow-clouds(@mouseover="setProgress(progress)" @mouseleave="setProgress(0)"
    :style='{"--height": 2*radius + "px","--color": customColor}')
    .skill-progress-content
        transition(name="bounce" mode="out-in")
            h3.skill-progress-value.mb-2(v-if="isProgress > 0" key="progress")
                | {{isProgress}}%
            i.skill-progress-icon.mb-2(v-else :class="icon" key="skill")
        h5.m-0.text-uppercase
            | {{skill}}
    svg(:height="radius * 2" :width="radius * 2")
        circle(
            :stroke='customColor'
            :opacity='isProgress ? .2 : 1'
            fill='transparent'
            :stroke-width='stroke'
            :r='normalizedRadius'
            :cx='radius'
            :cy='radius'
        )
        circle(
            :stroke='customColor'
            fill='transparent'
            stroke-linecap='round'
            :stroke-dasharray='circumference + \' \' + circumference'
            :style='{ strokeDashoffset: strokeDashoffset }'
            :stroke-width='stroke'
            :r='normalizedRadius'
            :cx='radius'
            :cy='radius'
        )
</template>

<script>
export default {
    name: "CircleProgress",
    props: {
        icon: {type: String, default: "fas fa-fw fa-icons"},
        skill: {type: String, default: "Label"},
        radius: {type: Number, default: 150},
        stroke: {type: Number, default: 25},
        digits: {type: Boolean, default: true},
        color: {type: String, default: "#1abc9c"},
        progress: {type: Number, default: 0},
    },
    data() {
        const normalizedRadius = this.radius - this.stroke/2;
        const circumference = normalizedRadius * 2 * Math.PI;
        return {
            normalizedRadius,
            circumference,
            interval: null,
            customColor: this.color,
            isProgress: 0,
        };
    },
    mounted() {
        this.setProgress(0);
    },
    computed: {
        strokeDashoffset() {
            return this.circumference - this.isProgress / 100 * this.circumference;
        }
    },
    methods: {
        setProgress(value) {
            this.isProgress = value;
        },
        setColor(value) {
            this.customColor = value;
        }
    }
};
</script>

<style lang="scss" scoped>
// @import '../../../../css/variables/color.scss';
.skill-progress {
    position: relative;
    font-weight: 500;
    height: var(--height);
    width: var(--height);
    color: var(--color);
    display: block;
    margin: auto;
    border-radius: 50%;
    &-value,
    &-icon {
        font-size: 50px !important;
    }
    &-value {
        font-size: 50px;
        line-height: 1;
    }
    circle {
        fill: transparent;
        transition: stroke-dashoffset 0.8s;
        transform: rotate(-90deg);
        transform-origin: 50% 50%;
    }
    &-content {
        position: absolute;
        top: 50%;
        width: 100%;
        padding: 0 25px;
        transform: translateY(-50%);
    }
}
.bounce {
    &-enter-active {
        animation: bounce-in .5s;
    }
    &-leave-active {
        animation: bounce-in .5s reverse;
    }
}
@keyframes bounce-in {
    0% {
        transform: scale(0);
    }
    50% {
        transform: scale(1.3);
    }
    100% {
        transform: scale(1);
    }
}
</style>
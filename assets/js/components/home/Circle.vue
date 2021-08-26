<template lang="pug">
//- https://codepen.io/SynCap/pen/MMYwRr
//- https://codepen.io/nosurprisethere/pen/KJxwQz
div
    .progress-ring(
        :data-isProgress='isProgress'
        :class='{"show-digits": digitsVisible}'
        :style='{"--height": 2*radius + "px","--color": customColor}')
        svg(
            :height='radius * 2'
            :width='radius * 2')
            circle(
                :stroke='customColor'
                opacity='.2'
                fill='transparent'
                :stroke-width='stroke'
                :r='normalizedRadius'
                :cx='radius'
                :cy='radius'
            )
            circle(
                :stroke="'url(#GradientColor' + gradientId + ')'"
                fill='transparent'
                stroke-linecap='round'
                :stroke-dasharray='circumference + \' \' + circumference'
                :style='{ strokeDashoffset: strokeDashoffset }'
                :stroke-width='stroke'
                :r='normalizedRadius'
                :cx='radius'
                :cy='radius'
            )
            defs
                linearGradient(:id="'GradientColor' + gradientId")
                    stop(offset="0%" :stop-color="gradientColor")
                    stop(offset="100%" :stop-color="customColor")
    .range-slider.text-center
        input.range-slider__range.mt-5(v-model='isProgress' type='range' :style="{'--color-range': customColor, backgroundImage: `linear-gradient(90deg, ${this.customColor} ${this.isProgress}%, #cacfd2 ${this.isProgress}%)` }")
        .range-slider__value {{isProgress}}

    ul.nav.justify-content-center.align-items-center.my-3
        li.nav-item.m-1
            a.btn.btn-pill.btn-sm.px-3.btn-turquoise(href="javascript:void(0)" @click='setProgress(0)') 0
        li.nav-item.m-1
            a.btn.btn-pill.btn-sm.px-3.btn-turquoise(href="javascript:void(0)" @click='setProgress(10)') 10
        li.nav-item.m-1
            a.btn.btn-pill.btn-sm.px-3.btn-turquoise(href="javascript:void(0)" @click='setProgress(25)') 25
        li.nav-item.m-1
            a.btn.btn-pill.btn-sm.px-3.btn-turquoise(href="javascript:void(0)" @click='setProgress(33)') 33
        li.nav-item.m-1
            a.btn.btn-pill.btn-sm.px-3.btn-turquoise(href="javascript:void(0)" @click='setProgress(50)') 50
        li.nav-item.m-1
            a.btn.btn-pill.btn-sm.px-3.btn-turquoise(href="javascript:void(0)" @click='setProgress(66)') 66
        li.nav-item.m-1
            a.btn.btn-pill.btn-sm.px-3.btn-turquoise(href="javascript:void(0)" @click='setProgress(75)') 75
        li.nav-item.m-1
            a.btn.btn-pill.btn-sm.px-3.btn-turquoise(href="javascript:void(0)" @click='setProgress(95)') 95
        li.nav-item.m-1
            a.btn.btn-pill.btn-sm.px-3.btn-turquoise(href="javascript:void(0)" @click='setProgress(100)') 100
    .my-3.text-center
        b-button.btn-pill.mx-1(variant="peter-river" @click="setColor('#3498db')") peter river
        b-button.btn-pill.mx-1(variant="turquoise" @click="setColor('#1abc9c')") turquoise
        b-button.btn-pill.mx-1(variant="emerald" @click="setColor('#2ecc71')") emerald
    .my-3.text-center
        button.btn.btn-pill.btn-wet-asphalt.mx-1(@click="autoDemo") Auto
        button.btn.btn-pill.btn-wet-asphalt.mx-1(@click="digitsVisible = !digitsVisible") Digits
</template>

<script>
export default {
    name: "CircleProgress",
    props: {
        radius: {type: Number, default: 150},
        stroke: {type: Number, default: 25},
        digits: {type: Boolean, default: true},
        color: {type: String, default: "#1abc9c"},
        gradient: {type: String, default: ""},
        progress: {type: Number, default: 30},
    },
    data() {
        const normalizedRadius = this.radius - this.stroke/2;
        const circumference = normalizedRadius * 2 * Math.PI;
        return {
            normalizedRadius,
            circumference,
            interval: null,
            customColor: this.color,
            gradientColor: this.gradient ? this.gradient : this.color,
            isProgress: this.progress,
            digitsVisible: this.digits,
            gradientId: null
        };
    },
    // mounted() {
    //     this.autoDemo();
    // },
    created () {
        this.gradientId = Math.floor(Math.random() * 100000)
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
        },
        autoDemo(){
            this.isProgress = 0;
            clearInterval(this.interval);
            this.interval = setInterval(() => {
                this.isProgress += 5;
                if (this.isProgress >= 100) {
                    this.isProgress = 100;
                    clearInterval(this.interval);
                }
            }, 500);
        }
    }
};
</script>

<style lang="scss" scoped>
@import '../../../css/variables/color.scss';

$range-handle-color: $wet-asphalt !default;
$range-handle-size: 20px !default;
$range-label-color: $wet-asphalt !default;
$range-label-width: 60px !default;

.progress-ring {
    position: relative;
    font-weight: 500;
    font-size: calc( var(--height) * .35);
    height: var(--height);
    width: var(--height);
    color: var(--color);
    display: block;
    margin: auto;
    &.show-digits:before {
        content: attr(data-isProgress);
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
    }
    circle {
        fill: transparent;
        transition: stroke-dashoffset 0.5s;
        transform: rotate(-90deg);
        transform-origin: 50% 50%;
    }
}

.range-slider {
    margin: 60px 0;
    width: 100%;
}

.range-slider__range {
    -webkit-appearance: none;
    width: calc(100% - (#{$range-label-width + 13px}));
    height: 10px;
    border-radius: 5px;
    background: $clouds-600;
    outline: none;
    padding: 0;
    margin: 0;

    // Range Handle
    &::-webkit-slider-thumb {
        appearance: none;
        width: $range-handle-size;
        height: $range-handle-size;
        border-radius: 50%;
        background: $range-handle-color;
        cursor: pointer;
        transition: background .15s ease-in-out;

        &:hover {
            background: var(--color-range);
        }
    }

    &:active::-webkit-slider-thumb {
        background: var(--color-range);
    }

    &::-moz-range-thumb {
        width: $range-handle-size;
        height: $range-handle-size;
        border: 0;
        border-radius: 50%;
        background: $range-handle-color;
        cursor: pointer;
        transition: background .15s ease-in-out;

        &:hover {
            background: var(--color-range);
        }
    }

    &:active::-moz-range-thumb {
        background: var(--color-range);
    }
}

// Range Label
.range-slider__value {
    display: inline-block;
    position: relative;
    width: $range-label-width;
    color: #fff;
    line-height: 20px;
    text-align: center;
    border-radius: 3px;
    background: $range-label-color;
    padding: 5px 10px;
    margin-left: 8px;

    &:after {
        position: absolute;
        top: 8px;
        left: -7px;
        width: 0;
        height: 0;
        border-top: 7px solid transparent;
        border-right: 7px solid $range-label-color;
        border-bottom: 7px solid transparent;
        content: '';
    }
}
</style>

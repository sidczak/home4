<template lang="pug">
//- https://codepen.io/SynCap/pen/MMYwRr
div
    .isProgress-ring(
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
    input.ctrl.mt-5(v-model='isProgress' type='range')
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
    div.my-3.text-center
        b-button.btn-pill.mx-1(variant="peter-river" @click="setColor('#3498db')") peter river
        b-button.btn-pill.mx-1(variant="turquoise" @click="setColor('#1abc9c')") turquoise
        b-button.btn-pill.mx-1(variant="emerald" @click="setColor('#2ecc71')") emerald
    div.my-3.text-center
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
        progress: {type: Number, default: 30},
    },
    data() {
        const normalizedRadius = this.radius - this.stroke/2;
        const circumference = normalizedRadius * 2 * Math.PI;
        return {
            normalizedRadius,
            circumference,
            interval: null,
            customColor: '#1abc9c',
            isProgress: this.progress,
            digitsVisible: this.digits
        };
    },
    // mounted() {
    //     this.autoDemo();
    // },
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
.ctrl{
    width: 100%;
    margin: 1em auto;
}
.isProgress-ring {
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
        transform: rotate(90deg);
        transform-origin: 50% 50%;
    }
}
</style>

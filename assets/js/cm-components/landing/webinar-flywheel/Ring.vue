<template>
    <div class="ring" :class="{'multi': isMulti}">
        <div class="ring--bg ring--bg-4" :class="{'multi': isMulti}"></div>
        <div class="ring--bg ring--bg-3" :class="{'multi': isMulti}"></div>
        <div class="ring--bg ring--bg-2" :class="{'multi': isMulti}"></div>
        <div class="ring--bg ring--bg-1" :class="{'multi': isMulti}"></div>
        <div class="ring--bg ring--bg-blue2" v-show="isMulti">
            <!-- <div class="ring__arrow ring__arrow--top"></div>
            <div class="ring__arrow ring__arrow--bottom"></div>
            <div class="ring__arrow ring__arrow--right"></div>
            <div class="ring__arrow ring__arrow--left"></div> -->
        </div>
        <div class="ring--bg ring--bg-blue1" v-show="isMulti"></div>
        <div class="ring--rainbow"></div>
        <div class="ring--center">
            <h2 class="ring--center-title font-roboto-black" v-html="title"></h2>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Ring",
        props: {
            isMulti: {
                type: Boolean,
                default: false
            }
        },
        data () {
            return {
                title: "Webinar<br/> flywheel"
                
            }
        }
    };
</script>

<style lang="scss" scoped>
$ring: 500px;
$ringStep: 80px;
$ringSm: $ring - 200px;
$ringStepSm: $ringStep - 20px;
$ringCenter: $ring - 200px;
$ringCenterSm: $ringSm - 100px;
$ringBg: rgba(207, 210, 221, .2);

.ring {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    height: calc(2 * #{$ring});
    width: calc(2 * #{$ring});
    @media (max-width: 768px) {
        height: calc(2 * #{$ringSm + 30});
        width: calc(2 * #{$ringSm + 30});
    }
    &--bg {
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        margin:auto;
        border-radius: 50%;
        &-blue1 {
            background-color: lighten(#051937, 10%);
            width: $ring + $ringStep;
            height: $ring + $ringStep;
            @media (max-width: 768px) {
                width: $ringSm + $ringStepSm;
                height: $ringSm + $ringStepSm;
            }
        }
        &-blue2 {
            background-color: lighten(#051937, 20%);
            width: calc(#{$ring} + calc(2 * #{$ringStep}));
            height: calc(#{$ring} + calc(2 * #{$ringStep}));
            @media (max-width: 768px) {
                width: calc(#{$ringSm} + calc(2 * #{$ringStepSm}));
                height: calc(#{$ringSm} + calc(2 * #{$ringStepSm}));
            }
        }
        &-1 {
            background-color: $ringBg;
            width: $ring + $ringStep;
            height: $ring + $ringStep;
            @media (max-width: 768px) {
                width: $ringSm + $ringStepSm;
                height: $ringSm + $ringStepSm;
            }
            &.multi {
                width: calc(#{$ring} + calc(3 * #{$ringStep}));
                height: calc(#{$ring} + calc(3 * #{$ringStep}));
                @media (max-width: 768px) {
                    width: calc(#{$ringSm} + calc(3 * #{$ringStepSm}));
                    height: calc(#{$ringSm} + calc(3 * #{$ringStepSm}));
                }
            }
        }
        &-2 {
            background-color: lighten($ringBg, 2%);
            width: calc(#{$ring} + calc(2 * #{$ringStep}));
            height: calc(#{$ring} + calc(2 * #{$ringStep}));
            @media (max-width: 768px) {
                width: calc(#{$ringSm} + calc(2 * #{$ringStepSm}));
                height: calc(#{$ringSm} + calc(2 * #{$ringStepSm}));
            }
            &.multi {
                width: calc(#{$ring} + calc(4 * #{$ringStep}));
                height: calc(#{$ring} + calc(4 * #{$ringStep}));
                @media (max-width: 768px) {
                    width: calc(#{$ringSm} + calc(4 * #{$ringStepSm}));
                    height: calc(#{$ringSm} + calc(4 * #{$ringStepSm}));
                }
            }
        }
        &-3 {
            background-color: lighten($ringBg, 4%);
            width: calc(#{$ring} + calc(3 * #{$ringStep}));
            height: calc(#{$ring} + calc(3 * #{$ringStep}));
            @media (max-width: 768px) {
                width: calc(#{$ringSm} + calc(3 * #{$ringStepSm}));
                height: calc(#{$ringSm} + calc(3 * #{$ringStepSm}));
            }
            &.multi {
                width: calc(#{$ring} + calc(5 * #{$ringStep}));
                height: calc(#{$ring} + calc(5 * #{$ringStep}));
                @media (max-width: 768px) {
                    width: calc(#{$ringSm} + calc(5 * #{$ringStepSm}));
                    height: calc(#{$ringSm} + calc(5 * #{$ringStepSm}));
                }
            }
        }
        &-4 {
            background-color: lighten($ringBg, 6%);
            width: calc(#{$ring} + calc(4 * #{$ringStep}));
            height: calc(#{$ring} + calc(4 * #{$ringStep}));
            @media (max-width: 768px) {
                width: calc(#{$ringSm} + calc(4 * #{$ringStepSm}));
                height: calc(#{$ringSm} + calc(4 * #{$ringStepSm}));
            }
            &.multi {
                width: calc(#{$ring} + calc(6 * #{$ringStep}));
                height: calc(#{$ring} + calc(6 * #{$ringStep}));
                @media (max-width: 768px) {
                    width: calc(#{$ringSm} + calc(6 * #{$ringStepSm}));
                    height: calc(#{$ringSm} + calc(6 * #{$ringStepSm}));
                }
            }
        }
    }
    &--rainbow,
    &--center {
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        margin:auto;
        border-radius: 50%;
    }
    &--rainbow {
        background: linear-gradient(to right top, #051937, #004d7a, #008793, #00bf72, #a8eb12);
        width: $ring;
        height: $ring;
        animation: spin 10s linear infinite;
        @media (max-width: 768px) {
            width: $ringSm;
            height: $ringSm;
        }
    }
    &--center {
        background: #051937;
        width: $ringCenter;
        height: $ringCenter;
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        box-shadow: 0px 0px 30px 10px rgba(255,255,255,0.2);
        @media (max-width: 768px) {
            width: $ringCenterSm;
            height: $ringCenterSm;
        }
        &-title {
            text-align:center;
            color: #fff;
            width: 100%;
            margin: 0;
        }
    }
    &__arrow {
        width: 0; 
        height: 0;
        border-style: solid;
        position: absolute;
        &--top {
            border-width: 0 15px 15px 15px;
            border-color: transparent transparent #fff transparent;
            top: 15px;
            right: 50%;
            margin-right: -15px;
        } 
        &--bottom {
            border-width: 15px 15px 0 15px;
            border-color: #fff transparent transparent transparent;
            bottom: 15px;
            right: 50%;
            margin-right: -15px;
        }
        &--right {
            border-width: 15px 0 15px 15px;
            border-color: transparent transparent transparent #fff;
            right: 15px;
            top: 50%;
            margin-top: -15px;
        }
        &--left {
            border-width: 15px 15px 15px 0;
            border-color: transparent #fff transparent transparent;
            left: 15px;
            bottom: 50%;
            margin-bottom: -15px;
        }
    }
}
@keyframes spin{
    100%{
        transform:rotate(360deg);
    }
}
</style>
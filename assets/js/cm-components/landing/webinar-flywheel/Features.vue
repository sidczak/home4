<template>
    <section class="features">
        <div class="container features__container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-6">
                    <h2 class="features__subject">{{ heading }}</h2>
                    <p class="features__desc">{{ desc }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col text-center">
                    <h3 class="features__title">Lorem ipsum ...</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-6 col-md-3" v-for="(item, index) in items">
                    <div class="feature" :class="{ 'odd': index % 2 == 0 }">
                        <div class="feature-tile" @click="open(item)">
                            {{ item.title }}
                        </div>
                        <div class="feature--info" :class="{ 
                            'show': item.isOpen, 
                            'feature--info-left': index % 2 == 0, 
                            'feature--info-right': index % 2 == 1 }">
                            {{ item.desc }}
                            <div class="btn-close" @click='close(item)'>Close</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row features__wrapper">
                <div class="col-6 col-lg-3 feature" v-for="(item, index) in items">
                    <div class="feature__tile align-items-end" @click="open(item)" :class="{ 'feature__tile--light': index % 3 == 0, 'feature__tile--blue': index % 3 == 2 }">
                        <div class="feature__circle-bg" :class="[item.circleBg, {'feature__circle-bg--light': index % 3 == 0, 'feature__circle-bg--blue': index % 3 == 2 }]"></div>
                        <div class="feature__icon-svg" v-if="item.icon" :is="item.icon" :class="{'feature__icon-svg--white': index % 3 == 2}"></div>
                        <div class="col">
                            <h4 class="feature__title" v-html="item.title" :class="{ 'feature__title--white': index % 3 == 2 }"></h4>
                            <div class="feature__see-more" :class="{'feature__see-more--white': index % 3 == 2}">
                                feature_see_more
                                <div class="feature__arrow" :class="{'feature__arrow--white': index % 3 == 2}">
                                    SVG Arrow
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="feature__info align-items-end" :class="{ 'show': item.isOpen, 'feature__info--left': index % 2 == 0, 'feature__info--right': index % 2 == 1 }">
                        <div class="feature__icon-svg feature__icon-svg--info" v-if="item.icon" :is="item.icon">SVG</div>
                        <div class="col">
                            <h4 class="feature__title feature__title--info" v-html="item.title">SVG</h4>
                            <p class="feature__desc" v-html="item.desc"></p>
                            <div class="feature__close" @click='close(item)'>
                                Back
                                <div class="feature__arrow feature__arrow--close">Arrow SVG</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col feature">
                    <a class="feature__tile feature__tile--blue feature__tile--all-features align-items-center" href="#">
                        <div class="feature__circle-bg feature__circle-bg--blue feature__circle-bg--top-left"></div>
                        <div class="col">
                            <div class="feature__all-features">
                                vfwergre
                                <div class="feature__arrow feature__arrow--white">SVG Arrow</div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    name: "Features",
    data () {
        return {
            heading: "Features",
            desc: "Features",
            items: [
                {
                    icon: "AutomatedWebinars",
                    title: 'Competition law',
                    desc: 'Schärer Attorneys at Schärer Attorneys at Schärer Attorneys at Schärer Attorneys at Schärer Attorneys at',
                    circleBg: 'feature__circle-bg--bottom-right',
                    isOpen: false
                }, 
                {
                    title: 'Constitutional, community and administrative law',
                    desc: 'Civil law reg',
                    isOpen: false
                },
                {
                    title: 'Constitutional, community and administrative law',
                    desc: 'Civil law reg',
                    isOpen: false
                },
                {
                    title: 'Construction, planning and environmental law',
                    desc: 'Our speci',
                    isOpen: false
                },
                {
                    title: 'Competition law',
                    desc: 'Schärer Attorneys at Schärer Attorneys at Schärer Attorneys at Schärer Attorneys at Schärer Attorneys at',
                    isOpen: false
                }, 
                {
                    title: 'Constitutional, community and administrative law',
                    desc: 'Civil law reg',
                    isOpen: false
                },
                {
                    title: 'Constitutional, community and administrative law',
                    desc: 'Civil law reg',
                    isOpen: false
                },
                {
                    title: 'Construction, planning and environmental law',
                    desc: 'Our speci',
                    isOpen: false
                },
                {
                    title: 'Constitutional, community and administrative law',
                    desc: 'Civil law reg',
                    isOpen: false
                },
                {
                    title: 'Constitutional, community and administrative law',
                    desc: 'Civil law reg',
                    isOpen: false
                },
                {
                    title: 'Construction, planning and environmental law',
                    desc: 'Our speci',
                    isOpen: false
                }
            ]
        }
    },
    methods:{
        open: function(item){
            this.closeAll();
            item.isOpen = true
        },
        close: function(item){
            item.isOpen = false
        },
        closeAll: function() {
            for(var item in this.items) {
                this.items[item].isOpen = false
            }
        }
    }
};
</script>

<style lang="scss" scoped>
$featuresBg: #edf0f7;
$featuresShadow: #23346b;
$tileBlue: #3365ca;
$tileLight: #e0e4f2;
$circleSize: 500px;
$circleSizeSm: 300px;

.features {
    position: relative;
    padding: 150px 0;
    &:before {
        content: '';
        background-color: $featuresBg;
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 300px;
    }
    &__container {
        position: relative;
    }
    &__subject {
        margin-bottom: 50px;
        font-size: 2.625rem;
        font-weight: 700;
        @media only screen and (max-width: 768px) {
            margin-bottom: 35px;
            font-size: 1.625rem;
        }
    }
    &__desc {
        margin-bottom: 100px;
        font-size: 1.125rem;
        @media only screen and (max-width: 768px) {
            margin-bottom: 30px;
            font-size: 0.875rem;
        }
    }
    &__title {
        font-size: 1.3125rem;
        font-weight: 700;
        margin-bottom: 45px;
        @media only screen and (max-width: 768px) {
            font-size: 1.125rem;
            margin-bottom: 40px;
        }
    }
    &__wrapper {
        background-color: #fff;
        margin: 0;
        border-radius: 20px;
        box-shadow: 0px 15px 60px 0px rgba($featuresShadow, 0.05);
    }
}
.feature {
    position: relative;
    padding: 0;
    height: 300px;
    width: 100%;
    cursor: pointer;
    @media only screen and (max-width: 768px) {
        height: 200px;
    }
    &__circle-bg {
        // background-image: url('~assets/images/landing/webinar-flywheel/features/feature-tiles-bg.png?=500');
        background-repeat: no-repeat;
        background-size: contain;
        position: absolute;
        width: $circleSize;
        height: $circleSize;
        opacity: .1;
        @media only screen and (max-width: 768px) {
            // background-image: url('~assets/images/landing/webinar-flywheel/features/feature-tiles-bg.png?=300');
            width: $circleSizeSm;
            height: $circleSizeSm;
        }
        &--blue {
            opacity: 1;
        }
        &--light {
            opacity: .2;
        }
        &--bottom-right {
            bottom: -$circleSize/2;
            right: -$circleSize/2;
            @media only screen and (max-width: 768px) {
                bottom: -$circleSizeSm/2;
                right: -$circleSizeSm/2;
            }
        }
        &--bottom-left {
            bottom: -$circleSize/2;
            left: -$circleSize/2;
            @media only screen and (max-width: 768px) {
                bottom: -$circleSizeSm/2;
                left: -$circleSizeSm/2;
            }
        }
        &--top-right {
            top: -$circleSize/2;
            right: -$circleSize/2;
            @media only screen and (max-width: 768px) {
                top: -$circleSizeSm/2;
                right: -$circleSizeSm/2;
            }
        }
        &--top-left {
            top: -$circleSize/2;
            left: -$circleSize/2;
            @media only screen and (max-width: 768px) {
                top: -$circleSizeSm/2;
                left: -$circleSizeSm/2;
            }
        }
    }
    &__tile {
        background-color: #fff;
        display: flex;
        flex-wrap: wrap;
        padding: 110px 15px 30px;
        height: 100%;
        position: relative;
        overflow: hidden;
        text-decoration: none;
        @media only screen and (max-width: 768px) {
            padding: 60px 5px 20px;
        }
        &--light {
            background-color: $tileLight;
        }
        &--blue {
            background-color: $tileBlue;
        }
        &:hover {
            .feature__arrow {
                animation: animationArrow 1.5s linear infinite;
            }
        }
        &--all-features {
            padding-top: 30px;
        }
    }
    &:first-child {
        .feature__tile {
            border-top-left-radius: 20px;
        }
    }
    &:last-child {
        .feature__tile {
            border-bottom-right-radius: 20px;
        }
    }
    @media only screen and (max-width: 992px) {
        &:nth-child(2) {
            .feature__tile {
                border-top-right-radius: 20px;
            }
        }
        &:nth-last-child(2) {
            .feature__tile {
                border-bottom-left-radius: 20px;
            }
        }
    }
    @media only screen and (min-width: 992px) {
        &:nth-child(4) {
            .feature__tile {
                border-top-right-radius: 20px;
            }
        }
        &:nth-last-child(4) {
            .feature__tile {
                border-bottom-left-radius: 20px;
            }
        }
    }
    &__icon-svg {
        position: absolute;
        top: 30px;
        left: 30px;
        width: 50px;
        height: 50px;
        fill: $tileBlue;
        @media only screen and (max-width: 768px) {
            top: 20px;
            left: 20px;
            width: 34px;
            height: 34px;
        }
        &--white {
            fill: #fff;
        }
        &--info {
            top: 70px;
            left: 70px;
            @media only screen and (max-width: 768px) {
                top: 30px;
                left: 30px;
            }
        }
    }
    &__title {
        margin-bottom: 25px;
        font-weight: 700;
        font-size: 1.3125rem;
        @media only screen and (max-width: 768px) {
            margin-bottom: 10px;
            font-size: .8125rem;
        }
        &--white {
            color: #fff;
        }
        &--info {
            margin-bottom: 40px;
            font-size: 2.625rem;
            @media only screen and (max-width: 768px) {
                margin-bottom: 20px;
                font-size: 1.625rem;
            }
        }
    }
    &__desc {
        font-size: 1.125rem;
        @media only screen and (max-width: 768px) {
            font-size: .875rem;
        }
    }
    &__all-features {
        position: relative;
        padding-right: 30px;
        font-weight: 700;
        font-size: 1.3125rem;
        color: #fff;
        @media only screen and (max-width: 768px) {
            font-size: .8125rem;
        }
    }
    &__see-more {
        position: relative;
        padding-right: 30px;
        text-transform: uppercase;
        font-size: .75rem;
        &--white {
            color: #fff;
        }
    }
    &__arrow {
        position: absolute;
        width: 24px;
        height: 24px;
        right: 0;
        top: 50%;
        margin-top: -12px;
        transform: translateX(-10%);
        svg {
            vertical-align: baseline;
        }
        &--white {
            fill: #fff;
        }
        &--close {
            transform: translateX(-10%) rotate(180deg);
        }
    }
    &__info {
        background-color: #fff;
        display: flex;
        flex-wrap: wrap;
        height: 0;
        width: 100%;
        transition: all 0.5s ease;
        position: absolute;
        top: 0;
        overflow: hidden;
        z-index: 1;
        box-shadow: 0px 46px 25px 0px rgba(35, 52, 107, 0.05);
        border-radius: 20px;
        cursor: auto;
        opacity: 0;
        .col {
            opacity: 0;
            transition-property: opacity;
            transition-duration: .5s;
            transition-delay: .5s;
            visibility: hidden;
        }
        &.show {
            width: calc(200% + 20px);
            height: calc(200% + 20px);
            padding: 150px 55px 70px;
            opacity: 1;
            .col {
                opacity: 1;
                visibility: visible;
            }
            @media only screen and (max-width: 768px) {
                padding: 100px 15px 30px;
            }
        }
        &--left {
            top: -10px;
            left: -10px;
        }
        &--right {
            top: -10px;
            right: -10px;
        }
    }
    &:nth-last-child(2) {
        .feature__info--left {
            top: auto;
            bottom: -10px;
        }
    }
    @media only screen and (min-width: 992px) {
        &:nth-last-child(3) {
            .feature__info--right {
                top: auto;
                bottom: -10px;
            }
        }
        &:nth-last-child(4) {
            .feature__info--left {
                top: auto;
                bottom: -10px;
            }
        }
    }
    &__close {
        position: relative;
        padding: 10px 40px 10px 10px;
        float: right;
        text-transform: uppercase;
        font-size: 12px;
        cursor: pointer;
        &:hover {
            .feature__arrow {
                animation: animationArrowClose 1.5s linear infinite;
            }
        }
    }
}
@keyframes animationArrow {
    50% {
        transform: translateX(25%);
    }
}
@keyframes animationArrowClose {
    50% {
        transform: translateX(25%) rotate(180deg);
    }
}
</style>

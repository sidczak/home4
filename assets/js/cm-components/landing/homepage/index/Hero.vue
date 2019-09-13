<template lang="pug">
    .hero.align-items-center(:class="photo" align-v="center")
        b-container.h-100(:fluid = "fluid")
            b-row(align-v="center" class="h-100")
                b-col(sm="12" md="6" :xl="[fluid ? 5 : 6]" :offset-xl="[fluid ? 1 : 0]")
                    .hero__wrapper
                        h1.hero__title(v-html="$t('vhp.pages.index.hero.title')")
                        p.hero__desc(v-html="$t('vhp.pages.index.hero.desc')")
                        .hero-btns__wrapper
                            div
                                a.hero__btn.hero__btn--free(:href="$resolveUrl('HOMEPAGE.free_signup')" v-html="$t('vhp.pages.index.hero.btn_start')")
                                p.hero-btn__desc(v-html="$t('vhp.pages.index.hero.btn_start.desc')")
                            div
                                nuxt-link.hero__btn.hero__btn--pricing(:to="localePath('pricing')" v-html="$t('vhp.pages.index.hero.btn_pricing')")
                        .hero-scrolls
                            Mouse.hero-scrolls__mouse
                            Arrow.hero-scrolls__arrow
</template>

<script>
import Mouse from '~/assets/images/scrolls/mouse.svg?inline'
import Arrow from '~/assets/images/arrows/down_arrow.svg?inline'

export default {
    components: {
        Mouse,
        Arrow,
    },
    data() {
        return {
            fluid: true,
            photo: null,
            photos: ['option1', 'option2', 'option3', 'option4', 'option5']
        }
    },
    created() {
        const number = Math.floor(Math.random() * this.photos.length)
        this.photo = this.photos[number]
    },
    mounted() {
        window.addEventListener('resize', this.handleResize)
        this.handleResize()
    },
    destroyed() {
        window.removeEventListener('resize', this.handleResize)
    },
    methods: {
        handleResize() {
            if (1440 > window.innerWidth) {
                this.fluid = false
            } else {
                this.fluid = true
            }
        }
    }
}
</script>

<style lang="scss" scoped>
@import url('https://fonts.googleapis.com/css?family=Poppins:700&display=swap&subset=latin-ext');
$poppins: 'Poppins';
$greenBtn: #48a90c;
$greenBtnHover: #399202;
$time: 0.5s;
$ease: ease-in-out;
$shadow: #ebeef5;
$shadowHover: #d9dde8;
$gray: #cfd4e2;
$heroBg: #eef1f7;
@keyframes scroll {
    0% { transform: translateY(0) }
    100% { transform: translateY(15px) }
}

.hero {
    display: flex;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    background-color: $heroBg;
    min-height: 980px;
    max-height: 1080px;
    height: 100vh;
    padding: 150px 0;
    @media (min-width: 1920px) {
        background-size: auto;
        min-height: 1080px;
        .container-fluid {
            max-width: 1920px;
        }
    }
    @media (max-width: 1680px) {
        min-height: 845px;
        max-height: 945px;
    }
    @media (max-width: 1440px) {
        min-height: 710px;
        max-height: 810px;
    }
    @media (max-width: 1200px) {
        min-height: 625px;
        max-height: 725px;
    }
    @media (max-width: 991px) {
        padding: 100px 0;
        min-height: 500px;
        max-height: 550px;
    }
    @media (max-width: 767px) {
        background-size: contain;
        background-position: bottom;
        padding: 80px 0 90%;
        min-height: none;
        max-height: none;
        height: auto;
    }
    &.option1 {
        background-image: url('~assets/images/landing/index/option1.jpg?size=1920');
        @media (max-width: 767px) {
            background-image: url('~assets/images/landing/index/option1-mobile.jpg?size=760');
        }
    }
    &.option2 {
        background-image: url('~assets/images/landing/index/option2.jpg?size=1920');
        @media (max-width: 767px) {
            background-image: url('~assets/images/landing/index/option2-mobile.jpg?size=760');
        }
    }
    &.option3 {
        background-image: url('~assets/images/landing/index/option3.jpg?size=1920');
        @media (max-width: 767px) {
            background-image: url('~assets/images/landing/index/option3-mobile.jpg?size=760');
        }
    }
    &.option4 {
        background-image: url('~assets/images/landing/index/option4.jpg?size=1920');
        @media (max-width: 767px) {
            background-image: url('~assets/images/landing/index/option4-mobile.jpg?size=760');
        }
    }
    &.option5 {
        background-image: url('~assets/images/landing/index/option5.jpg?size=1920');
        @media (max-width: 767px) {
            background-image: url('~assets/images/landing/index/option5-mobile.jpg?size=760');
        }
    }
    &__wrapper {
        display: block;
    }
    &__title {
        font: {
            size: 3.875rem;
            family: $poppins;
            weight: 700;
        }
        margin: 0 0 60px;
        color: $dark-lighter-1;
        @media (max-width: 1680px) {
            font-size: 2.875rem;
            margin-bottom: 40px;
        }
        @include mac15 {
            font-size: 2.125rem;
            margin-bottom: 30px;
        }
        @include lg {
            font-size: 1.875rem;
            margin-bottom: 20px;
        }
        @include md {
            font-size: 1.5625rem;
        }
        @include sm {
            font-size: 1.75rem;
            margin-bottom: 30px;
        }
    }
    &__desc {
        font-size: 1.5rem;
        color: $ash-darker-1;
        margin: 0 0 60px;
        @media (max-width: 1680px) {
            font-size: 1.3125rem;
            margin-bottom: 40px;
        }
        @include mac15 {
            font-size: 1rem;
            margin-bottom: 30px;
        }
        @include lg {
            font-size: .875rem;
            margin-bottom: 20px;
        }
        @include md {
            font-size: .875rem;
        }
        @include sm {
            font-size: 1rem;
            margin-bottom: 30px;
        }
    }
    &-btns__wrapper {
        display: flex;
        @include sm {
            justify-content: center;
            position: relative;
            z-index: 2;
            flex-direction: column;
        }
    }
    &-btn__desc {
        font-size: 0.6875rem;
        color: $ash-darker-1;
        margin: 15px 0 0;
        @include md {
            width: 150px;
            text-align: center;
        }
        @include sm {
            margin: 15px auto;
            width: 100%;
        }
    }
    &__btn {
        font-size: 0.9375rem;
        font-weight: 500;
        text: {
            align: center;
            transform: uppercase;
            decoration: none;
        }
        padding: 14px 55px;
        border-radius: 40px;
        display: block;
        min-width: 225px;
        @include lg {
            padding: 14px 20px;
            min-width: initial;
            min-width: 150px;
            font-size: 0.75rem;
        }
        &--free {
            background-color: $greenBtn;
            color: $white;
            transition: background-color $time $ease;
            margin-right: 35px;
            &:hover {
                  background-color: $greenBtnHover;
            }
            @include lg {
                margin-right: 15px;
            }
            @include sm {
                margin-right: 0;
            }
        }
        &--pricing {
            background-color: $white;
            color: $dark-lighter-1;
            box-shadow: 0px 0px 106px 0px $shadow;
            transition: box-shadow $time $ease;
            &:hover {
                box-shadow: 0px 0px 106px 0px $shadowHover;
            }
        }
    }
    &-scrolls {
        display: flex;
        flex-direction: column;
        margin-top: 65px;
        @media (max-width: 1680px) {
            margin-top: 40px;
        }
        @include mac15 {
            margin-top: 30px;
        }
        @include lg {
            margin-top: 20px;
        }
        @include md {
            display: none;
        }
        &__mouse {
            margin-bottom: 10px;
            g {
                stroke: $gray;
            }
        }
        &__arrow {
            animation-name: scroll;
            animation-duration: 1s;
            animation-iteration-count: infinite;
            animation-timing-function: linear;
            animation-direction: alternate;
            g {
                stroke: $gray;
            }
        }
    }
}
[lang="ru"] .hero__title {
    font-family: $font-roboto;
    font-weight: 800;
}
</style>

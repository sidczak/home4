<template lang="pug">
    .banner
        b-container
            .banner__wrapper-pulse
                .banner__pulse-4
                .banner__pulse-3
                .banner__pulse-2
                .banner__pulse-1
                .banner__wrapper
                    b-row.banner__content
                        b-col(lg="6")
                            h3.banner__title(v-html="$t('vhp.pages.index.banner.title')")
                            p.banner__desc(v-html="$t('vhp.pages.index.banner.desc')")
                            .text-center.text-md-left
                                b-button.text-uppercase(variant="discover-scenario" :to="localePath('tools-webinar-flywheel')")
                                    | {{ $t('vhp.pages.index.banner.btn_discover_scenario') }}
                    .banner__ring-wrapper
                        .banner__ring-pulse-3
                        .banner__ring-pulse-2
                        .banner__ring-pulse-1
                        Ring(isMulti)
</template>

<script>
import Ring from './Ring.vue'

export default {
    components: {
        Ring
    }
}
</script>

<style lang="scss" scoped>
$wrapperLeftBg: #1c2b5a;
$wrapperRightBg: #1e377e;
$pulseBorder: #e5e7f0;
$pulseRingBorder: #203da8;
$bannerDesc: #c2cceb;
$btnDiscoverScenario: #3365ca;

.banner {
    padding: 150px 0;
    &__wrapper-pulse {
        position: relative;
    }
    &__pulse-1,
    &__pulse-2,
    &__pulse-3,
    &__pulse-4 {
        border: 2px solid $pulseBorder;
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        border-radius: 50%;
        @include md {
            top: auto;
            bottom: 0;
            transform: translateY(0);
            left: 50%;
            transform: translateX(-50%);
        }
        @include sm {
            display: none;
        }
    }
    &__pulse-1 {
        height: 440px;
        width: 440px;
        right: 25px;
        opacity: .6;
        @include lg {
            right: -70px;
        }
        @include md {
            bottom: -20px;
        }
    }
    &__pulse-2 {
        height: 530px;
        width: 530px;
        right: -20px;
        opacity: .4;
        @include lg {
            right: -115px;
        }
        @include md {
            bottom: -65px;
        }
    }
    &__pulse-3 {
        height: 620px;
        width: 620px;
        right: -65px;
        opacity: .25;
        @include lg {
            right: -160px;
        }
        @include md {
            bottom: -110px;
        }
    }
    &__pulse-4 {
        height: 700px;
        width: 700px;
        right: -105px;
        opacity: .14;
        @include lg {
            right: -200px;
        }
        @include md {
            bottom: -150px;
        }
    }
    &__wrapper {
        background: $wrapperLeftBg;
        background: linear-gradient(to right, $wrapperLeftBg 0%, $wrapperRightBg 100%);
        border-radius: 20px;
        padding: 55px 65px;
        box-shadow: 0px 0px 106px 0px rgba(217, 221, 232, 0.4);
        position: relative;
        overflow: hidden;
        @include md {
            padding-bottom: 550px;
        }
        @include sm {
            padding: 30px 20px 415px;
        }
    }
    &__content {
        position: relative;
        z-index: 1;
    }
    &__title {
        margin-bottom: 30px;
        font-weight: 700;
        font-size: 2.125rem;
        color: $white;
        @include sm {
            margin-bottom: 25px;
            font-size: 1.625rem;
        }
    }
    &__desc {
        margin-bottom: 40px;
        font-size: 1.125rem;
        color: $bannerDesc;
        @include sm {
            margin-bottom: 25px;
            font-size: .875rem;
        }
    }
    &__ring-wrapper,
    &__ring-pulse-1,
    &__ring-pulse-2,
    &__ring-pulse-3 {
        border: 2px solid $pulseRingBorder;
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        bottom: 0;
        border-radius: 50%;
        @include md {
            top: auto;
            transform: translateY(0);
            left: 50%;
            transform: translateX(-50%);
            bottom: -110px;
        }
        @include sm {
            bottom: -70px;
        }
    }
    &__ring-wrapper {
        border: none;
        height: 620px;
        width: 620px;
        right: -65px;
        @include lg {
            right: -160px;
        }
        @include sm {
            height: 450px;
            width: 450px;
        }
    }
    &__ring-pulse-1 {
        height: 700px;
        width: 700px;
        right: -40px;
        opacity: .4;
        @include md {
            bottom: -40px;
        }
        @include sm {
            height: 520px;
            width: 520px;
            bottom: -35px;
        }
    }
    &__ring-pulse-2 {
        height: 900px;
        width: 900px;
        right: -140px;
        opacity: .4;
        @include md {
            bottom: -140px;
        }
        @include sm {
            height: 650px;
            width: 650px;
            bottom: -100px;
        }
    }
    &__ring-pulse-3 {
        height: 1200px;
        width: 1200px;
        right: -290px;
        opacity: .4;
        @include md {
            bottom: -290px;
        }
        @include sm {
            height: 850px;
            width: 850px;
            bottom: -200px;
        }
    }
    .btn-discover-scenario {
        background-color: $btnDiscoverScenario;
        color: $white;
        font-size: .9375rem;
        font-weight: 500;
        padding:  13px 15px;
        min-width: 250px;
        border-radius: 40px;
        box-shadow: none;
        position: relative;
        &:hover {
            background-color: darken( $btnDiscoverScenario, 5% );
        }
    }
}
</style>

<template>
    <div class="banner">
        <div class="container">
            <div class="banner__wrapper-pulse">
                <div class="banner__pulse-4"></div>
                <div class="banner__pulse-3"></div>
                <div class="banner__pulse-2"></div>
                <div class="banner__pulse-1"></div>
                <div class="banner__wrapper">
                    <div class="row banner__content">
                        <div class="col-lg-6">
                            <h3 class="banner__title">Title banner</h3>
                            <p class="banner__desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin nibh augue, suscipit a, scelerisque sed, lacinia in, mi. Cras vel lorem.</p>
                            <div class="text-center text-md-left">
                                <button class="btn btn-discover-scenario text-uppercase">Button</button>
                            </div>
                        </div>
                    </div>
                    <div class="banner__ring-wrapper">
                        <div class="banner__ring-pulse-3"></div>
                        <div class="banner__ring-pulse-2"></div>
                        <div class="banner__ring-pulse-1"></div>
                        <Ring isMulti></Ring>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
$white: #fff;

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
        @media (max-width: 992px) {
            top: auto;
            bottom: 0;
            transform: translateY(0);
            left: 50%;
            transform: translateX(-50%);
        }
        @media (max-width: 768px) {
            display: none;
        }
    }
    &__pulse-1 {
        height: 440px;
        width: 440px;
        right: 25px;
        opacity: .6;
        @media (max-width: 1200px) {
            right: -70px;
        }
        @media (max-width: 992px) {
            bottom: -20px;
        }
    }
    &__pulse-2 {
        height: 530px;
        width: 530px;
        right: -20px;
        opacity: .4;
        @media (max-width: 1200px) {
            right: -115px;
        }
        @media (max-width: 992px) {
            bottom: -65px;
        }
    }
    &__pulse-3 {
        height: 620px;
        width: 620px;
        right: -65px;
        opacity: .25;
        @media (max-width: 1200px) {
            right: -160px;
        }
        @media (max-width: 992px) {
            bottom: -110px;
        }
    }
    &__pulse-4 {
        height: 700px;
        width: 700px;
        right: -105px;
        opacity: .14;
        @media (max-width: 1200px) {
            right: -200px;
        }
        @media (max-width: 992px) {
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
        @media (max-width: 992px) {
            padding-bottom: 550px;
        }
        @media (max-width: 768px) {
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
        @media (max-width: 768px) {
            margin-bottom: 25px;
            font-size: 1.625rem;
        }
    }
    &__desc {
        margin-bottom: 40px;
        font-size: 1.125rem;
        color: $bannerDesc;
        @media (max-width: 768px) {
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
        @media (max-width: 992px) {
            top: auto;
            transform: translateY(0);
            left: 50%;
            transform: translateX(-50%);
            bottom: -110px;
        }
        @media (max-width: 768px) {
            bottom: -70px;
        }
    }
    &__ring-wrapper {
        border: none;
        height: 620px;
        width: 620px;
        right: -65px;
        @media (max-width: 1200px) {
            right: -160px;
        }
        @media (max-width: 768px) {
            height: 450px;
            width: 450px;
        }
    }
    &__ring-pulse-1 {
        height: 700px;
        width: 700px;
        right: -40px;
        opacity: .4;
        @media (max-width: 992px) {
            bottom: -40px;
        }
        @media (max-width: 768px) {
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
        @media (max-width: 992px) {
            bottom: -140px;
        }
        @media (max-width: 768px) {
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
        @media (max-width: 992px) {
            bottom: -290px;
        }
        @media (max-width: 768px) {
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

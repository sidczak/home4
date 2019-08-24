<template>
    <section class="inspired">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 inspired__contents">
                    <h3 class="inspired__title">inspired__title</h3>
                    <p class="inspired__desc">inspired__desc</p>
                    <div class="inspired__btn-wrapper">
                        <button class="btn btn-inspired text-uppercase">inspired</button>
                        
                    </div>
                </div>
                <div class="col-xl-6 inspired__ring-wrapper">
                    <Ring isMulti></Ring>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import Ring from './Ring.vue'

export default {
    components: {
        Ring
    },
    data() {
        return {
        }
    }
}
</script>

<style lang="scss" scoped>
$inspiredBg: #edf0f7;
.inspired {
    position: relative;
    padding: 80px 0;
    &:before {
        content: '';
        background-color: $inspiredBg;
        width: 1500px;
        height: 725px;
        position: absolute;
        bottom: -300px;
        left: 50%;
        transform: translateX(-50%);
        border-top-right-radius: 100%;
        border-top-left-radius: 100%;
        @media (min-width: 1200px) {
            width: 120%;
        }
        @media (max-width: 767px) {
            height: 465px;
            bottom: -100px;
        }
    }
    &__ring-wrapper {
        position: relative;
        height: 820px;
        @media (max-width: 767px) {
            height: 540px;
        }
    }
    &__contents {
        z-index: 1;
    }
    &__title {
        margin-bottom: 40px;
        line-height: 1;
        font-size: 3.875rem;
        font-weight: 700;
        @media (max-width: 767px) {
            font-size: 2.25rem;
        }
    }
    &__desc {
        margin-bottom: 40px;
        font-size: 1.125rem;
        @media (max-width: 767px) {
            font-size: .875rem;
        }
    }
    &__btn-wrapper {
        position: relative;
        display: inline-block;
        padding-bottom: 30px;
    }
    &__note {
        white-space: nowrap;
        font-size: .6875rem;
        margin: 0;
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
    }
}
</style>

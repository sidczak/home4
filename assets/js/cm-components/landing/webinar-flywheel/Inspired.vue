<template>
    <section class="inspired">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7 inspired__contents">
                    <h3 class="inspired__title">Title inspired</h3>
                    <p class="inspired__desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin nibh augue, suscipit a, scelerisque sed, lacinia in, mi. Cras vel lorem. Etiam pellentesque aliquet tellus. Phasellus pharetra nulla ac diam. Quisque semper justo at risus.</p>
                    <div class="inspired__btn-wrapper">
                        <button class="btn btn-inspired text-uppercase">inspired</button>
                    </div>
                </div>
                <div class="col-lg-5 inspired__ring-wrapper">
                    <div class="inspired__ring-position">
                        <Ring isMulti></Ring>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import Ring from './Ring.vue'

export default {
    name: "Inspired",
    components: {
        Ring
    }
}
</script>

<style lang="scss" scoped>
$inspiredBg: #edf0f7;
.inspired {
    position: relative;
    padding: 80px 0;
    z-index: 1;
    &:before {
        content: '';
        background-color: $inspiredBg;
        width: 1500px;
        height: 40%;
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        border-top-right-radius: 100%;
        border-top-left-radius: 100%;
        @media (min-width: 1200px) {
            width: 120%;
        }
    }
    &__ring-wrapper {
        position: relative;
        height: 660px;
        @media (max-width: 767px) {
            height: 420px;
        }
    }
    &__ring-position {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        right: 0;
        left: 0;
        @media (min-width: 992px) {
            left: 260px;
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
        @media (max-width: 991px) {
            margin-bottom: 40px;
        }
        @media (max-width: 767px) {
            text-align: center;
            width: 100%;
        }
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

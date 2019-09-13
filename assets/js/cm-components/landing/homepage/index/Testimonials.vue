<template lang="pug">
    .testimonials
        b-container.testimonials__area(fluid)
            b-row
                b-col
                    div(v-swiper="swiperOption")
                        .swiper-wrapper
                            .swiper-slide(v-for="item in items" @mouseover="mouseover" @mouseleave="mouseleave")
                                Testimonial(:url="item.url" :icon="item.icon" :author="item.author" :company="item.company" :desc="item.desc")
                        .swiper-pagination
                        .testimonials__navigation
                            .swiper-button-prev
                                Arrow
                            .swiper-button-next
                                Arrow
        b-container
            b-row
                b-col.text-center
                    h3.testimonials__title
                        | {{ $t('vhp.pages.index.testimonial.title_webinar_stories') }}
                    b-button.text-uppercase(variant="webinar-stories" href="https://clients.clickmeeting.com")
                        | {{ $t('vhp.pages.index.testimonial.btn_webinar_stories') }}
                        Arrow.testimonials__arrow
</template>

<script>
import Vue from 'vue'
import Testimonial from '../../common/Testimonial.vue'
import InstallSwiper from '~/plugins/vue-awesome-swiper'
import Arrow from '~/assets/images/arrows/down_arrow.svg?inline'

InstallSwiper(Vue)

export default {
    components: {
        Testimonial,
        Arrow
    },
    data() {
        return {
            swiperOption: {
                slidesPerView: 'auto',
                centeredSlides: true,
                loop: true,
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev'
                }
            },
            items: [
                {
                    url: 'https://clients.clickmeeting.com/customers/nest-bank',
                    icon: 'kamila-szymanska.jpg',
                    author: this.$t('vhp.pages.index.testimonial.author_nest_bank'),
                    company: this.$t('vhp.pages.index.testimonial.company_nest_bank'),
                    desc: this.$t('vhp.pages.index.testimonial.desc_nest_bank')
                },
                {
                    url: 'https://clients.clickmeeting.com/customers/clustaar',
                    icon: 'default.jpg',
                    author: this.$t('vhp.pages.index.testimonial.author_clustaar'),
                    company: this.$t('vhp.pages.index.testimonial.company_clustaar'),
                    desc: this.$t('vhp.pages.index.testimonial.desc_clustaar')
                },
                {
                    url: 'https://clients.clickmeeting.com/customers/g2a',
                    icon: 'default.jpg',
                    author: this.$t('vhp.pages.index.testimonial.author_g2a'),
                    company: this.$t('vhp.pages.index.testimonial.company_g2a'),
                    desc: this.$t('vhp.pages.index.testimonial.desc_g2a')
                },
                {
                    url: 'https://clients.clickmeeting.com/customers/arturo-tedeschi',
                    icon: 'arturo-tedeschi.jpg',
                    author: this.$t('vhp.pages.index.testimonial.author_at'),
                    company: this.$t('vhp.pages.index.testimonial.company_at'),
                    desc: this.$t('vhp.pages.index.testimonial.desc_at')
                },
                {
                    url: 'https://clients.clickmeeting.com/customers/senuto',
                    icon: 'karolina-matyska.jpg',
                    author: this.$t('vhp.pages.index.testimonial.author_senuto'),
                    company: this.$t('vhp.pages.index.testimonial.company_senuto'),
                    desc: this.$t('vhp.pages.index.testimonial.desc_senuto')
                }
            ]
        }
    },
    mounted() {
        this.swiper.slideTo(2, 1000, false)
    },
    methods: {
        mouseover() {
            this.swiper.autoplay.stop()
        },
        mouseleave() {
            this.swiper.autoplay.start()
        }
    }
}
</script>

<style lang="scss" scoped>
$time: 0.5s;
$ease: ease-in-out;
$btnTestimonials: #48a90c;
$btnTestimonialsHover: #399202;
$arrowDisabled: #ccd0dc;
@keyframes animationArrow {
    50% {
        transform: translate(25%, -50%) rotate(-90deg);
    }
}
.testimonials {
    position: relative;
    padding: 0 0 80px;
    margin-top: -40px;
    &__area {
        position: relative;
        top: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 100%;
        @include md {
            width: 180%;
        }
        @include sm {
            width: 220%;
        }
    }
    &__navigation {
        position: absolute;
        top: 0;
        height: 0;
        width: 800px;
        left: 50%;
        transform: translateX(-50%);
        z-index: 1;
        @include md {
            width: 100vw;
        }
        @include sm {
            top: auto;
            bottom: -17px;
            z-index: 11;
        }
    }
    &__title {
        margin-bottom: 40px;
        font-weight: 700;
        font-size: 1.75rem;
        color: $dark-lighter-1;
        @include sm {
            margin-bottom: 30px;
            font-size: 1.625rem;
        }
    }
    &__arrow {
        position: absolute;
        width: 25px;
        height: 25px;
        right: 20px;
        top: 50%;
        transform: rotate(-90deg) translateX(50%);
        transition: transform $time $ease;
        g {
            stroke: $white;
        }
    }
    .btn {
        position: relative;
        font-weight: 500;
        font-size: .9375rem;
        padding: 13px 65px 13px 25px;
        border-radius: 40px;
        box-shadow: none;
        &-webinar-stories {
            background-color: $btnTestimonials;
            text-align: left;
            min-width: 300px;
            color: $white;
            &:hover {
                background-color: $btnTestimonialsHover;
                .testimonials__arrow {
                    animation: animationArrow 1.5s linear infinite;
                }
            }
        }
    }
}
.swiper {
    &-wrapper {
        margin-bottom: 120px;
        @include sm {
            margin-bottom: 80px;
        }
    }
    &-container {
        overflow: visible;
    }
    &-slide {
        max-width: 720px;
        margin-left: 50px;
        margin-right: 50px;
        height: auto;
        opacity: .3;
        transition: opacity 0.5s ease;
        @include sm {
            max-width: 275px;
            margin-left: 5px;
            margin-right: 5px;
        }
        &-active {
            opacity: 1;
        }
    }
    &-pagination {
        bottom: -70px;
        @include sm {
            bottom: -50px;
        }
    }
    &-button-prev,
    &-button-next {
        background-image: none;
        width: 44px;
        top: 125px;
        margin-top: 0;
        svg {
            position: absolute;
            width: 24px;
            height: 24px;
            top: 50%;
            g {
                stroke: $arrowDisabled;
            }
        }
        &:hover {
            svg {
                g {
                    stroke: $cm;
                }
            }
        }
        &.swiper-button-disabled {
            opacity: 1;
            svg {
                g {
                    stroke: $arrowDisabled;
                }
            }
        }
        @include sm {
            top: 0;
        }
    }
    &-button-prev {
        left: 10px;
        svg {
            transform: translateY(-50%) rotate(90deg);
            left: 0;
        }
    }
    &-button-next {
        right: 10px;
        svg {
            transform: translateY(-50%) rotate(-90deg);
            right: 0;
        }
    }
}
/deep/ .swiper-pagination-bullet-active {
    background-color: $cm;
}
</style>

<template lang="pug">
    .blog
        b-container
            b-row(v-if="!swiperSlide")
                b-col(v-for="post in posts")
                    Post(:url="post.url" :img="post.imgBg" :date="post.date" :label="post.label" :title="post.title" :desc="post.desc")
            b-row(v-else)
                b-col
                    div(v-swiper="swiperOption")
                        .swiper-wrapper
                            .swiper-slide(v-for="post in posts")
                                Post(:url="post.url" :img="post.imgBg" :date="post.date" :label="post.label" :title="post.title" :desc="post.desc")
                        .swiper-pagination
            b-row
                b-col.text-center
                    b-button.text-uppercase(variant="see-our-blog" href="https://blog.clickmeeting.com")
                        | {{ $t('vhp.pages.index.blog.btn_see_our_blog') }}
                        Arrow.blog__arrow
</template>

<script>
import 'swiper/dist/css/swiper.css'
import Post from './_Post.vue'
import Arrow from '~/assets/images/arrows/down_arrow.svg?inline'

export default {
    components: {
        Post,
        Arrow
    },
    data() {
        return {
            swiperSlide: false,
            swiperOption: {
                slidesPerView: 'auto',
                centeredSlides: true,
                loop: true,
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true
                }
            },
            posts: [
                {
                    url: 'https://blog.clickmeeting.com/flywheel',
                    imgBg: 'webinar-flywheel.png',
                    date: 'June 19, 2019',
                    label: this.$t('vhp.pages.index.blog.label_busness_tips_tricks'),
                    title: this.$t('vhp.pages.index.blog.webinar_flywheel.title'),
                    desc: this.$t('vhp.pages.index.blog.webinar_flywheel.desc')
                },
                {
                    url: 'https://blog.clickmeeting.com/webinar-report-infographic',
                    imgBg: 'webinar-report.png',
                    date: 'February 26, 2019',
                    label: this.$t('vhp.pages.index.blog.label_busness_tips_tricks'),
                    title: this.$t('vhp.pages.index.blog.webinar_report.title'),
                    desc: this.$t('vhp.pages.index.blog.webinar_report.desc')
                },
                {
                    url: 'https://blog.clickmeeting.com/webinar-hosting',
                    imgBg: 'webinar-hosting.png',
                    date: 'April 18, 2019',
                    label: this.$t('vhp.pages.index.blog.label_busness_tips_tricks'),
                    title: this.$t('vhp.pages.index.blog.webinar_hosting.title'),
                    desc: this.$t('vhp.pages.index.blog.webinar_hosting.desc')
                }
            ]
        }
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
            if (1200 > window.innerWidth) {
                this.swiperSlide = true
            } else {
                this.swiperSlide = false
            }
        }
    }
}
</script>

<style lang="scss" scoped>
$time: 0.5s;
$ease: ease-in-out;
$blogBg: #eef1f7;
$btnBlog: #48a90c;
$btnBlogHover: #399202;
.blog {
    position: relative;
    overflow: hidden;
    padding: 100px 0 80px;
    &:before {
        background: $blogBg;
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 125px;
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
        &-see-our-blog {
            background-color: $btnBlog;
            text-align: left;
            min-width: 250px;
            color: $white;
            &:hover {
                background-color: $btnBlogHover;
                .blog__arrow {
                    transform: translate(5px, -50%) rotate(-90deg);
                }
            }
        }
    }
}
.swiper {
    &-container {
        overflow: visible;
    }
    &-slide {
        max-width: 380px;
        margin-left: 10px;
        margin-right: 10px;
        @include sm {
            max-width: 290px;
            margin-left: 10px;
            margin-right: 10px;
        }
    }
    &-pagination {
        bottom: 25px;
    }
}
/deep/ .swiper-pagination-bullet-active {
    background-color: $cm;
}
</style>

<template lang="pug">
    a.post.flex-column(:href="url" target="_blank")
        img.post__img(:src="currentImg")
        .post__body
            h3.post__title(v-html="title")
            .post__meta.justify-content-between.align-items-center
                .post__label.text-uppercase(v-html="label")
                .post__data
                    | {{ date }}
            p.post__desc(v-html="desc")
        .post__footer.mt-auto
            .post__see-more.text-uppercase
                | {{ $t('vhp.pages.index.blog.btn_see_more') }}
                Arrow.post__arrow
</template>

<script>
import Arrow from '~/assets/images/arrows/down_arrow.svg?inline'
export default {
    components: {
        Arrow
    },
    props: {
        url: {
            type: String,
            default: null
        },
        img: {
            type: String,
            default: null
        },
        date: {
            type: String,
            default: null
        },
        label: {
            type: String,
            default: null
        },
        title: {
            type: String,
            default: null
        },
        desc: {
            type: String,
            default: null
        }
    },
    computed: {
        currentImg() {
            return require('assets/images/index/post/' + this.img)
        }
    }
}
</script>

<style lang="scss" scoped>
$time: 0.3s;
$ease: ease-in-out;
$labelBg: #eef1f7;
$postShadow: #d9dde8;
.post {
    background: $white;
    display: flex;
    margin: 0 auto 60px;
    border-radius: 20px;
    box-shadow: 0px 0px 106px 0px rgba($postShadow, 0.5);
    min-height: 620px;
    max-width: 380px;
    transition: box-shadow $time $ease;
    text-decoration: none;
    @include sm {
        min-height: 465px;
        max-width: 290px;
    }
    &:hover {
        box-shadow: 0px 0px 106px 0px rgba($postShadow, 1);
    }
    &__body {
        padding: 25px 25px 0;
        overflow: hidden;
        height: 295px;
        @include sm {
            padding: 20px 20px 0;
            height: 210px;
        }
    }
    &__footer {
        padding: 25px;
        border-bottom-left-radius: 20px;
        border-bottom-right-radius: 20px;
        @include sm {
            padding: 20px;
        }
    }
    &__img {
        display: block;
        margin: 0 auto;
        border-top-left-radius: 20px;
        border-top-right-radius: 20px;
        width: 100%;
    }
    &__title {
        margin-bottom: 10px;
        font-weight: 700;
        font-size: 1.5625rem;
        color: $dark-lighter-1;
        overflow: hidden;
        max-height: 90px;
        @include sm {
            font-size: 1.125rem;
        }
    }
    &__desc {
        margin-bottom: 0;
        font-size: 0.9375rem;
        color: $ash-darker-1;
        @include sm {
            font-size: 0.75rem;
        }
    }
    &__meta {
        display: flex;
        margin-bottom: 35px;
        @include sm {
            margin-bottom: 25px;
        }
    }
    &__label {
        background: $labelBg;
        display: inline-block;
        padding: 7px 10px;
        font-weight: 500;
        font-size: .6875rem;
        line-height: 1;
        text-align: center;
        white-space: nowrap;
        vertical-align: baseline;
        border-radius: 4px;
        color: $ash-darker-1;
        @include sm {
            font-size: .5625rem;
        }
    }
    &__data {
        font-weight: 500;
        font-size: .75rem;
        color: $ash-darker-1;
        @include sm {
            font-size: .625rem;
        }
    }
    &__see-more {
        position: relative;
        padding-right: 40px;
        font-size: .75rem;
        color: $link-darker-1;
    }
    &__arrow {
        position: absolute;
        right: 0;
        top: 50%;
        transform: rotate(-90deg) translateX(50%);
        width: 24px;
        height: 24px;
        g {
            stroke: $link-darker-1;
        }
    }
}
</style>

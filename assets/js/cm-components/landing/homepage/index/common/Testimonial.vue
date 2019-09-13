<template lang="pug">
    a.testimonial.flex-column(:href="url" target="_blank")
        .testimonial__body
            .testimonial__desc(v-html="desc")
        .testimonial__footer.align-items-center
            img.testimonial__img(:srcSet="currentImg" loading="auto")
            .testimonial__signature
                .testimonial__author(v-html="author")
                .testimonial__company(v-html="company")
</template>

<script>
export default {
    props: {
        url: {
            type: String,
            default: null
        },
        icon: {
            type: String,
            default: null
        },
        author: {
            type: String,
            default: null
        },
        company: {
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
            return require('assets/images/index/testimonial/' + this.icon)
        }
    }
}
</script>

<style lang="scss" scoped>
$testimonialImgBg: #eef1f7;
$testimonialImgShadow: #d9dde8;
.testimonial {
    display: flex;
    text-decoration: none;
    height: 100%;
    &__body {
        padding: 0 25px;
        margin-bottom: 50px;
        @include sm {
            padding: 0 15px;
        }
    }
    &__desc {
        font-weight: 700;
        font-size: 1.75rem;
        color: $dark-lighter-1;
        @include sm {
            font-size: 1.25rem;
        }
    }
    &__footer {
        display: flex;
        padding: 0 25px;
        margin-top: auto;
        min-height: 80px;
        @include sm {
            padding: 0 15px;
        }
    }
    &__img {
        background-color: $testimonialImgBg;
        width: 65px;
        height: 65px;
        border-radius: 20px;
        margin-right: 25px;
        box-shadow: 0px 10px 32px 0px rgba($testimonialImgShadow, 0.4);
    }
    &__signature {
        padding: 5px 0;
    }
    &__author {
        font-weight: 700;
        font-size: 1.125rem;
        color: $dark-lighter-1;
        @include sm {
            font-size: .9375rem;
        }
    }
    &__company{
        font-size: .875rem;
        color: $ash-darker-1;
        @include sm {
            font-size: .75rem;
        }
    }
}
</style>

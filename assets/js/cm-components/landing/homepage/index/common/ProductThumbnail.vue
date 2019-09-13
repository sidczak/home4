<template lang="pug">
    a.product-thumb(:href="$resolveUrl(url)")
        .product-thumb__icon(:is="icon")
        h3.product-thumb__title(v-html="title")
        p.product-thumb__desc(v-html="desc")
        .product-thumb__more
            p.product-thumb__link(v-html="$t('vhp.common.see_more')")
            Arrow.product-thumb__arrow
</template>

<script>
import Arrow from '~/assets/images/arrows/down_arrow.svg?inline'

export default {
    components: {
        Arrow,
    },
    props: {
        url: {
            type: String,
            default: null
        },
        icon: {
            type: Object,
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
}
</script>

<style lang="scss" scoped>
$startGradient: rgb(108, 188, 58);
$endGradient: rgb(72, 169, 12);

@keyframes animationArrow {
    50% {
        transform: translateX(25%) rotate(-90deg);
    }
}

.product-thumb {
    padding: 25px 25px 45px;
    border-radius: 20px;
    background-color: $white;
    box-shadow: 0px 0px 106px 0px rgba(217, 221, 232, 0.5);
    width: 280px;
    min-height: 320px;
    position: relative;
    @include lg {
        width: 220px;
        min-height: 400px;
    }
    @include md {
        width: calc(50% - 5px);
        min-height: 270px;
        padding: 15px;
        margin-bottom: 10px;
    }
    @include xs {
        min-height: 300px;
    }
    &:hover {
        cursor: pointer;
        text-decoration: none;
        background-color: transparent;
        background: linear-gradient(45deg, $startGradient 0%, $endGradient 100%);
        .product-thumb__icon g {
            stroke: $white;
        }
        .product-thumb__title,
        .product-thumb__desc {
            color: $white;
        }
        .product-thumb__more {
            visibility: visible;
            opacity: 1;
        }
        .product-thumb__link {
            @include md {
                color: $white;
            }
        }
        .product-thumb__arrow {
            animation: animationArrow 1.5s linear infinite;
            g {
                @include md {
                    stroke: $white;
                }
            }
        }
    }
    &__icon {
        margin-bottom: 25px;
        g {
            stroke: $cm;
        }
    }
    &__title {
        color: $dark-lighter-1;
        font-size: 1.5625rem;
        line-height: 30px;
        margin: 0 0 30px 0;
        @include md {
            font-size: 0.9375rem;
            margin-bottom: 20px;
            line-height: 16px;
        }
    }
    &__desc {
        color: $ash-darker-1;
        font-size: 0.9375rem;
        line-height: 22px;
        margin: 0;
        @include md {
            font-size: 0.75rem;
            line-height: 16px;
        }
    }
    &__more {
        visibility: hidden;
        opacity: 0;
        display: flex;
        align-items: center;
        justify-content: space-between;
        position: absolute;
        bottom: 12px;
        width: calc(100% - 50px);
        left: 25px;
        @include md {
            visibility: visible;
            opacity: 1;
            width: calc(100% - 25px);
            left: 15px;
        }
    }
    &__link {
        color: $white;
        font-size: 0.75rem;
        text-transform: uppercase;
        margin: 0;
        @include md {
            color: $link-darker-1;
        }
    }
    &__arrow {
        transform: rotate(-90deg);
        g {
            stroke: $white;
            @include md {
                stroke: $link-darker-1;
            }
        }
    }
}
</style>

<template lang="pug">
    .inspired
        b-container
            b-row.align-items-center
                b-col(xl="7" lg="6")
                    h3.inspired__title(v-html="$t('vhp.pages.tools_webinar_flywheel.inspired_title')")
                    p.inspired__desc(v-html="$t('vhp.pages.tools_webinar_flywheel.inspired_desc')")
                    .inspired__btn-wrapper
                        b-button.text-uppercase(variant="inspired" :href="$resolveUrl('HOMEPAGE.free_signup')" target="_blank")
                            | {{ $t('vhp.pages.tools_webinar_flywheel.inspired_btn_start_free') }}
                        p.inspired__note(v-html="$t('vhp.pages.tools_webinar_flywheel.inspired_note')")
                b-col.inspired__ring-wrapper(xl="5" lg="6")
                    WebinarFlywheel(isMulti)
</template>

<script>
import WebinarFlywheel from './WebinarFlywheel.vue'

export default {
    components: {
        WebinarFlywheel
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
    overflow: hidden;
    @include sm {
        padding: 85px 0;
    }
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
        @include lg-min {
            width: 120%;
        }
        @include sm {
            height: 465px;
            bottom: -100px;
        }
    }
    &__ring-wrapper {
        position: relative;
        height: 490px;
        @include md {
            margin-top: 40px;
        }
    }
    &__title {
        margin-bottom: 40px;
        line-height: 1;
        font-size: 3.875rem;
        font-weight: 700;
        color: $dark-lighter-1;
        @include sm {
            font-size: 2.25rem;
        }
    }
    &__desc {
        margin-bottom: 40px;
        font-size: 1.125rem;
        color: $ash-darker-1;
        @include sm {
            font-size: .875rem;
        }
        /deep/ strong {
            color: $dark-lighter-1;
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
        color: $ash-darker-1;
        margin: 0;
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
    }
}
</style>

<template lang="pug">
    .webinar-flywheel--integrations
        b-container
            b-row
                b-col.text-center
                    h3.webinar-flywheel--integrations-title {{ $t('vhp.pages.tools_webinar_flywheel.integration_title') }}
            b-row.webinar-flywheel--items.text-center
                b-col(lg="4" v-for="(item, index) in items")
                    .webinar-flywheel--item
                        component.webinar-flywheel--item-svg(v-if="item.cmp" :is="item.cmp")
                        .webinar-flywheel--item-desc {{ item.desc }}
                b-col(lg="4" align-self="center")
                    .webinar-flywheel--item
                        b-button.text-uppercase(variant="integrations" :href="$resolveUrl('integrations')" target="_blank")
                            | {{ $t('vhp.pages.tools_webinar_flywheel.integration_btn') }}
</template>

<script>
import GoogleAnalytics from '~/assets/images/landing/webinar-flywheel/google_analytics.svg?inline'
import GoogleTagManager from '~/assets/images/landing/webinar-flywheel/google_tag_manager.svg?inline'
import FacebookPixel from '~/assets/images/landing/webinar-flywheel/facebook_pixel.svg?inline'
import HubSpot from '~/assets/images/landing/webinar-flywheel/hubspot.svg?inline'
import Infusionsoft from '~/assets/images/landing/webinar-flywheel/infusionsoft.svg?inline'
import Pipedrive from '~/assets/images/landing/webinar-flywheel/pipedrive.svg?inline'
import Moodle from '~/assets/images/landing/webinar-flywheel/moodle.svg?inline'
import PayPal from '~/assets/images/landing/webinar-flywheel/paypal.svg?inline'
import Linkedin from '~/assets/images/landing/webinar-flywheel/linkedin.svg?inline'
import Facebook from '~/assets/images/landing/webinar-flywheel/facebook.svg?inline'
import YouTube from '~/assets/images/landing/webinar-flywheel/youtube.svg?inline'

export default {
    components: {
        GoogleAnalytics,
        GoogleTagManager,
        FacebookPixel,
        HubSpot,
        Infusionsoft,
        Pipedrive,
        Moodle,
        PayPal,
        Linkedin,
        Facebook,
        YouTube
    },
    data() {
        return {
            items: [
                {
                    cmp: GoogleAnalytics,
                    desc: this.$t('vhp.pages.tools_webinar_flywheel.integration_google_analytics')
                },
                {
                    cmp: GoogleTagManager,
                    desc: this.$t('vhp.pages.tools_webinar_flywheel.integration_google_tag_manager')
                },
                {
                    cmp: FacebookPixel,
                    desc: this.$t('vhp.pages.tools_webinar_flywheel.integration_facebook_pixel')
                },
                {
                    cmp: HubSpot,
                    desc: this.$t('vhp.pages.tools_webinar_flywheel.integration_hubspot')
                },
                {
                    cmp: Infusionsoft,
                    desc: this.$t('vhp.pages.tools_webinar_flywheel.integration_infusionsoft')
                },
                {
                    cmp: Pipedrive,
                    desc: this.$t('vhp.pages.tools_webinar_flywheel.integration_pipedrive')
                },
                {
                    cmp: Moodle,
                    desc: this.$t('vhp.pages.tools_webinar_flywheel.integration_moodle')
                },
                {
                    cmp: PayPal,
                    desc: this.$t('vhp.pages.tools_webinar_flywheel.integration_paypal')
                },
                {
                    cmp: Linkedin,
                    desc: this.$t('vhp.pages.tools_webinar_flywheel.integration_linkedin')
                },
                {
                    cmp: Facebook,
                    desc: this.$t('vhp.pages.tools_webinar_flywheel.integration_facebook')
                },
                {
                    cmp: YouTube,
                    desc: this.$t('vhp.pages.tools_webinar_flywheel.integration_youtube')
                }
            ]
        }
    }
}
</script>

<style lang="scss" scoped>
$dividingLine: #edf0f5;
.webinar-flywheel {
    &--integrations {
        padding: 75px 0;
        &-title {
            margin-bottom: 75px;
            font-size: 1.3125rem;
            color: $dark-lighter-1;
            @include md {
                margin-bottom: 15px;
            }
        }
    }
    &--items {
        position: relative;
        &:before,
        &:after {
            content: '';
            background-color: $dividingLine;
            position: absolute;
            top: 0;
            width: 1px;
            height: 100%;
            @include md {
                content: none;
            }
        }
        &:before {
            left: 33.33333%;
        }
        &:after {
            left: 66.66666%;
        }
        .col-lg-4 {
            border-bottom: 1px solid $dividingLine;
            &:last-child {
                border: none;
                .webinar-flywheel--item {
                    padding: 40px 0;
                }
                @include md {
                    .webinar-flywheel--item {
                        padding: 60px 0;
                    }
                }
            }
            @include md-min {
                &:nth-last-child(2),
                &:nth-last-child(3) {
                    border: none;
                }
            }
        }
    }
    &--item {
        display: block;
        padding: 20px 40px 40px;
        &-svg {
            height: 80px;
        }
        &-desc {
            font-size: .9375rem;
            color: $ash-darker-1;
            @include md {
                font-size: .8125rem;
            }
        }
    }
}
</style>

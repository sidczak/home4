<template lang="pug">
    #section-features.features
        b-container.features__container
            b-row.justify-content-center.text-center
                b-col(lg="6")
                    h2.features__subject(v-html="$t('vhp.pages.tools_webinar_flywheel.features_subject')")
                    p.features__desc(v-html="$t('vhp.pages.tools_webinar_flywheel.features_desc')")
            b-row
                b-col.text-center
                    h3.features__title(v-html="$t('vhp.pages.tools_webinar_flywheel.features_title')")
            b-row.features__wrapper
                b-col.feature(cols="6" lg="3" v-for="(item, index) in items")
                    .feature__tile.align-items-end(@click="open(item)" :class="{ 'feature__tile--light': index % 3 == 0, 'feature__tile--blue': index % 3 == 2 }")
                        .feature__circle-bg(:class="[item.circleBg, {'feature__circle-bg--light': index % 3 == 0, 'feature__circle-bg--blue': index % 3 == 2 }]")
                        .feature__icon-svg(v-if="item.icon" :is="item.icon" :class="{'feature__icon-svg--white': index % 3 == 2}")
                        b-col
                            h4.feature__title(v-html="item.title" :class="{ 'feature__title--white': index % 3 == 2 }")
                            .feature__see-more(:class="{'feature__see-more--white': index % 3 == 2}")
                                | {{ $t('vhp.pages.tools_webinar_flywheel.feature_see_more') }}
                                .feature__arrow(:class="{'feature__arrow--white': index % 3 == 2}")
                                    Arrow
                    .feature__info.align-items-end(:class="{ 'show': item.isOpen, 'feature__info--left': index % 2 == 0, 'feature__info--right': index % 2 == 1 }")
                        .feature__icon-svg.feature__icon-svg--info(v-if="item.icon" :is="item.icon")
                        b-col
                            h4.feature__title.feature__title--info(v-html="item.title")
                            p.feature__desc(v-html="item.desc")
                            .feature__close(@click='close(item)')
                                | {{ $t('vhp.pages.tools_webinar_flywheel.feature_back') }}
                                .feature__arrow.feature__arrow--close
                                    Arrow
                b-col.feature
                    a.feature__tile.feature__tile--blue.feature__tile--all-features.align-items-center(:href="$resolveUrl('HOMEPAGE.features')")
                        .feature__circle-bg.feature__circle-bg--blue.feature__circle-bg--top-left
                        b-col
                            .feature__all-features
                                | {{ $t('vhp.pages.tools_webinar_flywheel.feature_all') }}
                                .feature__arrow.feature__arrow--white
                                    Arrow
</template>

<script>
import AutomatedWebinars from '~/assets/images/landing/webinar-flywheel/features/automated_webinars.svg?inline'
import OnDemandWebinars from '~/assets/images/landing/webinar-flywheel/features/on_demand_webinars.svg?inline'
import AutoStream from '~/assets/images/landing/webinar-flywheel/features/auto_stream.svg?inline'
import AutoPublishProfile from '~/assets/images/landing/webinar-flywheel/features/auto_publish_profile.svg?inline'
import AutoPublishYoutube from '~/assets/images/landing/webinar-flywheel/features/auto_publish_youtube.svg?inline'
import AutoSendDropbox from '~/assets/images/landing/webinar-flywheel/features/auto_send_dropbox.svg?inline'
import ThankYouPage from '~/assets/images/landing/webinar-flywheel/features/thank_you_page.svg?inline'
import ThankYouEmail from '~/assets/images/landing/webinar-flywheel/features/thank_you_email.svg?inline'
import AutomaticFollowUpEmial from '~/assets/images/landing/webinar-flywheel/features/automatic_follow_up_emial.svg?inline'
import AutomaticInvitations from '~/assets/images/landing/webinar-flywheel/features/automatic_invitations.svg?inline'
import CertificatesAttendance from '~/assets/images/landing/webinar-flywheel/features/certificates_attendance.svg?inline'
import Arrow from '~/assets/images/landing/webinar-flywheel/arrow.svg?inline'

export default {
    components: {
        AutomatedWebinars,
        OnDemandWebinars,
        AutoStream,
        AutoPublishProfile,
        AutoPublishYoutube,
        AutoSendDropbox,
        ThankYouPage,
        ThankYouEmail,
        AutomaticFollowUpEmial,
        AutomaticInvitations,
        CertificatesAttendance,
        Arrow
    },
    data() {
        return {
            items: [
                {
                    icon: AutomatedWebinars,
                    title: this.$t('vhp.pages.tools_webinar_flywheel.feature_title_automated_webinars'),
                    desc: this.$t('vhp.pages.tools_webinar_flywheel.feature_desc_automated_webinars'),
                    circleBg: 'feature__circle-bg--bottom-right',
                    isOpen: false
                },
                {
                    icon: OnDemandWebinars,
                    title: this.$t('vhp.pages.tools_webinar_flywheel.feature_title_on_demand_webinars'),
                    desc: this.$t('vhp.pages.tools_webinar_flywheel.feature_desc_on_demand_webinars'),
                    circleBg: 'feature__circle-bg--bottom-left',
                    isOpen: false
                },
                {
                    icon: AutoStream,
                    title: this.$t('vhp.pages.tools_webinar_flywheel.feature_title_auto_stream'),
                    desc: this.$t('vhp.pages.tools_webinar_flywheel.feature_desc_auto_stream'),
                    circleBg: 'feature__circle-bg--top-right',
                    isOpen: false
                },
                {
                    icon: AutoPublishProfile,
                    title: this.$t('vhp.pages.tools_webinar_flywheel.feature_title_auto_publish_profile'),
                    desc: this.$t('vhp.pages.tools_webinar_flywheel.feature_desc_auto_publish_profile'),
                    circleBg: 'feature__circle-bg--top-left',
                    isOpen: false
                },
                {
                    icon: AutoPublishYoutube,
                    title: this.$t('vhp.pages.tools_webinar_flywheel.feature_title_auto_publish_youtube'),
                    desc: this.$t('vhp.pages.tools_webinar_flywheel.feature_desc_auto_publish_youtube'),
                    circleBg: 'feature__circle-bg--top-right',
                    isOpen: false
                },
                {
                    icon: AutoSendDropbox,
                    title: this.$t('vhp.pages.tools_webinar_flywheel.feature_title_auto_send_dropbox'),
                    desc: this.$t('vhp.pages.tools_webinar_flywheel.feature_desc_auto_send_dropbox'),
                    circleBg: 'feature__circle-bg--top-left',
                    isOpen: false
                },
                {
                    icon: ThankYouPage,
                    title: this.$t('vhp.pages.tools_webinar_flywheel.feature_title_thank_you_page'),
                    desc: this.$t('vhp.pages.tools_webinar_flywheel.feature_desc_thank_you_page'),
                    circleBg: 'feature__circle-bg--bottom-right',
                    isOpen: false
                },
                {
                    icon: ThankYouEmail,
                    title: this.$t('vhp.pages.tools_webinar_flywheel.feature_title_thank_you_email'),
                    desc: this.$t('vhp.pages.tools_webinar_flywheel.feature_desc_thank_you_email'),
                    circleBg: 'feature__circle-bg--bottom-left',
                    isOpen: false
                },
                {
                    icon: AutomaticFollowUpEmial,
                    title: this.$t('vhp.pages.tools_webinar_flywheel.feature_title_automatic_follow_up_emial'),
                    desc: this.$t('vhp.pages.tools_webinar_flywheel.feature_desc_automatic_follow_up_emial'),
                    circleBg: 'feature__circle-bg--bottom-right',
                    isOpen: false
                },
                {
                    icon: AutomaticInvitations,
                    title: this.$t('vhp.pages.tools_webinar_flywheel.feature_title_automatic_invitations'),
                    desc: this.$t('vhp.pages.tools_webinar_flywheel.feature_desc_automatic_invitations'),
                    circleBg: 'feature__circle-bg--bottom-left',
                    isOpen: false
                },
                {
                    icon: CertificatesAttendance,
                    title: this.$t('vhp.pages.tools_webinar_flywheel.feature_title_certificates_attendance'),
                    desc: this.$t('vhp.pages.tools_webinar_flywheel.feature_desc_certificates_attendance'),
                    circleBg: 'feature__circle-bg--top-right',
                    isOpen: false
                }
            ]
        }
    },
    methods: {
        open: function(item) {
            this.closeAll()
            item.isOpen = true
        },
        close: function(item) {
            item.isOpen = false
        },
        closeAll: function() {
            for (const item in this.items) {
                this.items[item].isOpen = false
            }
        }
    }
}
</script>

<style lang="scss" scoped>
$featuresBg: #edf0f7;
$featuresShadow: #23346b;
$tileBlue: #3365ca;
$tileLight: #e0e4f2;
$circleSize: 500px;
$circleSizeSm: 300px;

.features {
    position: relative;
    padding: 150px 0;
    &:before {
        content: '';
        background-color: $featuresBg;
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 300px;
    }
    &__container {
        position: relative;
    }
    &__subject {
        margin-bottom: 50px;
        font-size: 2.625rem;
        font-weight: 700;
        color: $dark-lighter-1;
        @include sm {
            margin-bottom: 35px;
            font-size: 1.625rem;
        }
    }
    &__desc {
        margin-bottom: 100px;
        font-size: 1.125rem;
        color: $ash-darker-1;
        /deep/ strong {
            color: $dark-lighter-1;
        }
        @include sm {
            margin-bottom: 30px;
            font-size: 0.875rem;
        }
    }
    &__title {
        font-size: 1.3125rem;
        font-weight: 700;
        color: $dark-lighter-1;
        margin-bottom: 45px;
        @include sm {
            font-size: 1.125rem;
            margin-bottom: 40px;
        }
    }
    &__wrapper {
        background-color: $white;
        margin: 0;
        border-radius: 20px;
        box-shadow: 0px 15px 60px 0px rgba($featuresShadow, 0.05);
    }
}
.feature {
    position: relative;
    padding: 0;
    height: 300px;
    width: 100%;
    cursor: pointer;
    @include sm {
        height: 170px;
    }
    &__circle-bg {
        background-image: url('~assets/images/landing/webinar-flywheel/features/feature-tiles-bg.png?=500');
        background-repeat: no-repeat;
        background-size: contain;
        position: absolute;
        width: $circleSize;
        height: $circleSize;
        opacity: .1;
        @include sm {
            background-image: url('~assets/images/landing/webinar-flywheel/features/feature-tiles-bg.png?=300');
            width: $circleSizeSm;
            height: $circleSizeSm;
        }
        &--blue {
            opacity: 1;
        }
        &--light {
            opacity: .2;
        }
        &--bottom-right {
            bottom: -$circleSize/2;
            right: -$circleSize/2;
            @include sm {
                bottom: -$circleSizeSm/2;
                right: -$circleSizeSm/2;
            }
        }
        &--bottom-left {
            bottom: -$circleSize/2;
            left: -$circleSize/2;
            @include sm {
                bottom: -$circleSizeSm/2;
                left: -$circleSizeSm/2;
            }
        }
        &--top-right {
            top: -$circleSize/2;
            right: -$circleSize/2;
            @include sm {
                top: -$circleSizeSm/2;
                right: -$circleSizeSm/2;
            }
        }
        &--top-left {
            top: -$circleSize/2;
            left: -$circleSize/2;
            @include sm {
                top: -$circleSizeSm/2;
                left: -$circleSizeSm/2;
            }
        }
    }
    &__tile {
        background-color: $white;
        display: flex;
        flex-wrap: wrap;
        padding: 110px 15px 30px;
        height: 100%;
        position: relative;
        overflow: hidden;
        text-decoration: none;
        @include sm {
            padding: 60px 5px 20px;
        }
        &--light {
            background-color: $tileLight;
        }
        &--blue {
            background-color: $tileBlue;
        }
        &:hover {
            .feature__arrow {
                animation: animationArrow 1.5s linear infinite;
            }
        }
        &--all-features {
            padding-top: 30px;
        }
    }
    &:first-child {
        .feature__tile {
            border-top-left-radius: 20px;
        }
    }
    &:last-child {
        .feature__tile {
            border-bottom-right-radius: 20px;
        }
    }
    @include md {
        &:nth-child(2) {
            .feature__tile {
                border-top-right-radius: 20px;
            }
        }
        &:nth-last-child(2) {
            .feature__tile {
                border-bottom-left-radius: 20px;
            }
        }
    }
    @include md-min {
        &:nth-child(4) {
            .feature__tile {
                border-top-right-radius: 20px;
            }
        }
        &:nth-last-child(4) {
            .feature__tile {
                border-bottom-left-radius: 20px;
            }
        }
    }
    &__icon-svg {
        position: absolute;
        top: 30px;
        left: 30px;
        width: 50px;
        height: 50px;
        fill: $tileBlue;
        @include sm {
            top: 20px;
            left: 20px;
            width: 34px;
            height: 34px;
        }
        &--white {
            fill: $white;
        }
        &--info {
            top: 70px;
            left: 70px;
            @include sm {
                top: 30px;
                left: 30px;
            }
        }
    }
    &__title {
        margin-bottom: 25px;
        font-weight: 700;
        font-size: 1.3125rem;
        color: $dark-lighter-1;
        @include sm {
            margin-bottom: 10px;
            font-size: .8125rem;
        }
        &--white {
            color: $white;
        }
        &--info {
            margin-bottom: 40px;
            font-size: 2.625rem;
            @include sm {
                margin-bottom: 20px;
                font-size: 1.625rem;
            }
        }
    }
    &__desc {
        font-size: 1.125rem;
        color: $ash-darker-1;
        @include sm {
            font-size: .875rem;
        }
    }
    &__all-features {
        position: relative;
        padding-right: 30px;
        font-weight: 700;
        font-size: 1.3125rem;
        color: $white;
        @include sm {
            font-size: .8125rem;
        }
    }
    &__see-more {
        position: relative;
        padding-right: 30px;
        text-transform: uppercase;
        font-size: .75rem;
        color: $dark-lighter-1;
        &--white {
            color: $white;
        }
    }
    &__arrow {
        position: absolute;
        width: 24px;
        height: 24px;
        right: 0;
        top: 50%;
        margin-top: -12px;
        transform: translateX(-10%);
        fill: $dark-lighter-1;
        svg {
            vertical-align: baseline;
        }
        &--white {
            fill: $white;
        }
        &--close {
            transform: translateX(-10%) rotate(180deg);
        }
    }
    &__info {
        background-color: $white;
        display: flex;
        flex-wrap: wrap;
        height: 0;
        width: 100%;
        transition: all 0.5s ease;
        position: absolute;
        top: 0;
        overflow: hidden;
        z-index: 1;
        box-shadow: 0px 46px 25px 0px rgba(35, 52, 107, 0.05);
        border-radius: 20px;
        cursor: auto;
        opacity: 0;
        .col {
            opacity: 0;
            transition-property: opacity;
            transition-duration: .5s;
            transition-delay: .5s;
            visibility: hidden;
        }
        &.show {
            width: calc(200% + 20px);
            height: calc(200% + 20px);
            padding: 150px 55px 70px;
            opacity: 1;
            .col {
                opacity: 1;
                visibility: visible;
            }
            @include sm {
                padding: 100px 15px 30px;
            }
        }
        &--left {
            top: -10px;
            left: -10px;
        }
        &--right {
            top: -10px;
            right: -10px;
        }
    }
    &:nth-last-child(2) {
        .feature__info--left {
            top: auto;
            bottom: -10px;
        }
    }
    @include md-min {
        &:nth-last-child(3) {
            .feature__info--right {
                top: auto;
                bottom: -10px;
            }
        }
        &:nth-last-child(4) {
            .feature__info--left {
                top: auto;
                bottom: -10px;
            }
        }
    }
    &__close {
        position: relative;
        padding: 10px 40px 10px 10px;
        float: right;
        text-transform: uppercase;
        font-size: 12px;
        color: $dark-lighter-1;
        cursor: pointer;
        &:hover {
            .feature__arrow {
                animation: animationArrowClose 1.5s linear infinite;
            }
        }
    }
}
@keyframes animationArrow {
    50% {
        transform: translateX(25%);
    }
}
@keyframes animationArrowClose {
    50% {
        transform: translateX(25%) rotate(180deg);
    }
}
</style>

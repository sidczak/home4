<template lang="pug">
    .statistics
        b-container
            b-row
                b-col
                    h3.statistics__title(v-html="$t('vhp.pages.index.statistics.title_webinar_results')")
                    b-row.justify-content-center
                        b-col(cols="12" xl="10")
                            b-row
                                b-col(lg="6" v-for="(result, index) in results")
                                    .statistics__block.d-flex.flex-column.justify-content-center
                                        .statistics__block-icon
                                            .statistics__block-svg(v-if="result.icon" :is="result.icon")
                                        label.statistics__block-label {{ result.label }}
                                        h4.statistics__block-value
                                            countTo(
                                                ref="countStatistics"
                                                :startVal="0"
                                                :endVal="result.value"
                                                :duration="3000"
                                                :separator="result.separator"
                                                :prefix="result.prefix ? result.prefix : ''"
                                                :suffix="result.suffix ? ' ' + result.suffix : ''"
                                                :autoplay="result.autoplay")
                                        p.statistics__block-desc {{ result.desc }}
            b-row.statistics__powerful-webinar
                b-col
                    h3.statistics__title(v-html="$t('vhp.pages.index.statistics.title_most_powerful_webinar')")
                    b-row.justify-content-center
                        b-col(lg="8")
                            b-row
                                b-col(cols="6" lg="3" v-for="(item, index) in items")
                                    .statistics__powerful-webinar-block
                                        .statistics__powerful-webinar-value
                                            countTo(ref="countStatistics" :startVal="0" :endVal="item.value" :duration="3000" :suffix="item.suffix ? item.suffix : ''" :autoplay="item.autoplay")
                                        .statistics__powerful-webinar-label {{ item.label }}
        ReviewsAwards.statistics__reviews-awards(justifyContentCenter contentCondens :desc="false")
</template>

<script>
import countTo from 'vue-count-to'
import ReviewsAwards from '../../partials/ReviewsAndAwards'
import MonetizingKnowledge from '~/assets/images/index/statistics/monetizing_knowledge.svg?inline'
import LeadGeneration from '~/assets/images/index/statistics/lead_generation.svg?inline'

export default {
    components: {
        ReviewsAwards,
        MonetizingKnowledge,
        LeadGeneration,
        countTo
    },
    data() {
        return {
            results: [
                {
                    icon: MonetizingKnowledge,
                    label: this.$t('vhp.pages.index.statistics.monetizing_knowledge_label'),
                    value: 43000,
                    separator: ' ',
                    prefix: '$',
                    desc: this.$t('vhp.pages.index.statistics.monetizing_knowledge_desc'),
                    autoplay: false
                },
                {
                    icon: LeadGeneration,
                    label: this.$t('vhp.pages.index.statistics.lead_generation_label'),
                    value: 2890,
                    separator: '',
                    suffix: this.$t('vhp.pages.index.statistics.lead_generation_suffix'),
                    desc: this.$t('vhp.pages.index.statistics.lead_generation_desc'),
                    autoplay: false
                }
            ],
            items: [
                {
                    value: 9,
                    label: this.$t('vhp.pages.index.statistics.hours_label'),
                    autoplay: false
                },
                {
                    value: 29,
                    label: this.$t('vhp.pages.index.statistics.presenters_label'),
                    autoplay: false
                },
                {
                    value: 3,
                    label: this.$t('vhp.pages.index.statistics.continents_label'),
                    autoplay: false
                },
                {
                    value: 2,
                    suffix: 'k',
                    label: this.$t('vhp.pages.index.statistics.attendees_label'),
                    autoplay: false
                }
            ]
        }
    },
    mounted: function() {
        window.addEventListener('scroll', this.handleScroll)
    },
    destroyed: function() {
        window.removeEventListener('scroll', this.handleScroll)
    },
    methods: {
        handleScroll() {
            const box = this.$el
            const scrollStart = box.offsetTop - 200
            if (scrollStart <= window.scrollY) {
                this.$refs.countStatistics.forEach((cnt) => cnt.start())
                window.removeEventListener('scroll', this.handleScroll)
            }
        }
    }
}
</script>

<style lang="scss" scoped>
$statisticsBg: #eef1f7;
$blockSvgBg: #666c7f;
.statistics {
    background: url("~assets/images/index/statistics/bg.jpg?size=1920") no-repeat center top $statisticsBg;
    padding: 80px 0 20px;
    @include sm {
        padding: 60px 0 80px;
    }
    &__title {
        margin-bottom: 75px;
        text-align: center;
        font-weight: 700;
        color: $dark-lighter-1;
        @include sm {
            margin-bottom: 45px;
            font-size: 1.625rem;
        }
    }
    &__block {
        position: relative;
        padding-left: 170px;
        margin-bottom: 100px;
        @include sm {
            padding-left: 125px;
            margin-bottom: 30px;
        }
    }
    &__block-icon {
        background-color: rgba($blockSvgBg, 0.07);
        position: absolute;
        left: 0;
        top: 5px;
        width: 154px;
        height: 154px;
        border-radius: 20px;
        &:before {
            background-color: $white;
            content: '';
            position: absolute;
            top: 15px;
            bottom: 15px;
            left: 15px;
            right: 15px;
            border-radius: 15px;
        }
        @include sm {
            top: 0px;
            width: 110px;
            height: 110px;
            &:before {
                top: 10px;
                bottom: 10px;
                left: 10px;
                right: 10px;
            }
        }
    }
    &__block-svg {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 55px;
        height: 55px;
        @include sm {
            width: 32px;
            height: 32px;
        }
        g {
            stroke: #ccd0dc;
        }
    }
    &__block-label {
        text-transform: uppercase;
        font-weight: 500;
        font-size: .875rem;
        color: $dark-lighter-1;
        @include sm {
            margin-bottom: 3px;
            font-size: .6875rem;
        }
    }
    &__block-value{
        font-weight: 900;
        font-size: 3.875rem;
        color: $dark-lighter-1;
        @include sm {
            margin-bottom: 3px;
            font-size: 2.625rem;
        }
    }
    &__block-desc {
        margin-bottom: 0;
        font-size: 1.125rem;
        color: $ash-darker-1;
        @include sm {
            font-size: .75rem;
        }
    }
    &__powerful-webinar {
        margin-bottom: 70px;
        text-align: center;
        @include sm {
            margin-bottom: 30px;
        }
        .statistics__title {
            margin-top: 20px;
            margin-bottom: 45px;
        }
    }
    &__powerful-webinar-block {
        margin-bottom: 30px;
    }
    &__powerful-webinar-value,
    &__powerful-webinar-label {
        font-weight: 900;
        color: $dark-lighter-1;
    }
    &__powerful-webinar-value {
        font-size: 3.125rem;
        line-height: 50px;
        @include sm {
            font-size: 2.625rem;
        }
    }
    &__powerful-webinar-label {
        font-size: 1.625rem;
        line-height: 26px;
        @include sm {
            font-size: 1.25rem;
        }
    }
    &__reviews-awards {
        margin-top: 0;
        margin-bottom: 0;
        /deep/ h2 {
            font-size: 1.75rem;
            margin-bottom: 45px;
            @include sm {
                font-size: 1.625rem;
            }
        }
    }
}
</style>

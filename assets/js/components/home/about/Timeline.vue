<template lang="pug">
    section.timeline.d-flex.flex-shrink-0.align-items-center.section-py-80(v-if="isSection")
        b-container
            b-row
                b-col
                    .timeline-circle.rounded-circle.d-flex.align-items-center.justify-content-center(:class="`${position}`")
                        .timeline-circle-content.text-center
                            i.mb-2.fas(:class="icon")
                            h5.mb-0 {{ title }}
            .timeline-list(:class="`${position}`")
                b-row.timeline-list-item(v-for="(skill, index) in skills" :key="index" :class="{'justify-content-start': index % 2 == 0 && position === 'center', 'justify-content-end': index % 2 == 1 && position === 'center'}")
                    b-col(:class="{'col-md-6': position === 'center'}")
                        .timeline-card
                            //- i.timeline-icon(:class="skill.icon")
                            i.timeline-icon.far.fa-dot-circle
                            strong.timeline-date
                                | {{ skill.date }}
                            h5
                                | {{ skill.title }}
                            h6
                                | {{ skill.desc }}
    .timeline(v-else)
        b-row
            b-col
                .timeline-circle.rounded-circle.d-flex.align-items-center.justify-content-center(:class="`${position}`")
                    .timeline-circle-content.text-center
                        i.mb-2.fas(:class="icon")
                        h5.mb-0 {{ title }}
        .timeline-list(:class="`${position}`")
            b-row.timeline-list-item(v-for="(skill, index) in skills" :key="index" :class="{'justify-content-start': index % 2 == 0 && position === 'center', 'justify-content-end': index % 2 == 1 && position === 'center'}")
                b-col(:class="{'col-md-6': position === 'center'}")
                    .timeline-card
                        i.timeline-icon.far.fa-dot-circle
                        strong.timeline-date
                            | {{ skill.date }}
                        h5
                            | {{ skill.title }}
                        h6
                            | {{ skill.desc }}
</template>
<script>    
    export default {
        name: "Timeline",
        props: {
            isSection: {
                type: Boolean,
                default: false
            },
            position: {
                type: String,
                default: 'center',
                validator: (value) => ['start', 'center', 'end'].indexOf(value) > -1,
            },
            title:  {
                type: String,
                default: null
            },
            icon:  {
                type: String,
                default: null
            },
            skills: {
                type: Array,
                default: () => {
                    return [
                        {
                            icon: "fab fa-symfony",
                            date: "2007-2009",
                            title: "Politechnika Łódzka",
                            desc: "Wydział Fizyki Technicznej, Informatyki i Matematyki Stosowanej",
                            kierunek: "informatyka",
                            specjalnosc: "Systemy Informatyczne w Zarządzaniu i Handlu Elektronicznym",
                            tytul: "magister"
                        },
                        {
                            icon: "fab fa-vuejs",
                            date: "2003-2007",
                            title: "Uniwersytet Kazimierza Wielkiego w Bydgoszczy",
                            desc: "Wydział Matematyki Techniki i Nauk Przyrodniczych",
                            kierunek: "informatyka",
                            specjalnosc: "informatyka ogólna",
                            tytul: "inżynier"
                        }
                    ]
                }
            }
        },
        data () {
            return {
                // skills: require("../../../data/skills")
            }
        }
    };
</script>
<style lang="scss" scoped>
@import '../../../../css/variables/color.scss';
.timeline {
    &-circle {
        border: 10px solid $wet-asphalt;
        position: relative;
        width: 200px;
        height: 200px;
        margin: 0 auto 4px;
        i {
            font-size: 50px;
        }
        &-content {
            padding: 0 25px;
        }
        &.start {
            @media (min-width: 768px) {
                margin: 0 auto 4px 0;
            }
        }
        &.center {
            margin: 0 auto 4px;
        }
        &.end {
            @media (min-width: 768px) {
                margin: 0 0 4px auto;
            }
        }
    }
    &-list {
        position: relative;
        &:before {
            border-left: 2px solid $silver;
            content: '';
            position: absolute;
            height: 100%;
            left: 50%;
            transform: translateX(-50%);
            @media (max-width: 767px) {
                content: none;
            }
        }
        &-item {
            margin: 3rem 0;
            &:first-child {
                margin-top: 0;
                padding-top: 3rem;
            }
            &:last-child {
                margin-bottom: 0;
            }
        }
        &.start {
            padding-left: 100px;
            @media (max-width: 767px) {
                padding-left: 0;
            }
            &:before {
                left: 100px;
                transform: translateX(-50%);
            }
            .timeline-card {
                text-align: left;
                padding-left: 15px;
                .timeline-icon {
                    left: -12px;
                }
                @media (max-width: 767px) {
                    text-align: center;
                    padding-left: 0;
                }
            }
        }
        &.center {
            .justify-content-start {
                .timeline-card {
                    text-align: right;
                    padding-right: 15px;
                    @media (max-width: 767px) {
                        text-align: center;
                        padding-right: 0;
                    }
                    .timeline-icon {
                        right: -12px;
                    }
                }
            }
            .justify-content-end {
                .timeline-card {
                    text-align: left;
                    padding-left: 15px;
                    @media (max-width: 767px) {
                        text-align: center;
                        padding-left: 0;
                    }
                    .timeline-icon {
                        left: -12px;
                    }
                }
            }
        }
        &.end {
            padding-right: 100px;
            @media (max-width: 767px) {
                padding-right: 0;
            }
            &:before {
                right: 100px;
                left: auto;
                transform: translateX(50%);
            }
            .timeline-card {
                text-align: right;
                padding-right: 15px;
                .timeline-icon {
                    right: -12px;
                }
                @media (max-width: 767px) {
                    text-align: center;
                    padding-right: 0;
                }
            }
        }
    }
    &-icon {
        background: #fff;
        border: 4px solid #fff;
        position: absolute;
        top: 0;
        @media (max-width: 767px) {
            display: none;
        }
    }
    &-date {
        color: $turquoise;
    }
}
</style>
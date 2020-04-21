<template lang="pug">
    section.d-flex.flex-shrink-0.align-items-center.section-py-80(v-if="isSection")
        b-container
            b-row
                b-col
                    .timeline-circle.rounded-circle.d-flex.align-items-center.justify-content-center
                        .timeline-circle-content.text-center
                            i.mb-2.fas(:class="icon")
                            h5.mb-0 {{ title }}
            .timeline-list
                b-row.timeline-list-item(v-for="(skill, index) in skills" :key="index" :class="{'justify-content-start': index % 2 == 0, 'justify-content-end': index % 2 == 1 }")
                    b-col.text-center(md="6" :class="{'text-md-right': index % 2 == 0, 'text-md-left': index % 2 == 1 }")
                        .timeline-card(:class="{'odd': index % 2 == 0, 'even': index % 2 == 1 }")
                            //- i.mb-2(:class="skill.icon")
                            i.timeline-icon.far.fa-dot-circle
                            strong.timeline-date
                                | {{ skill.date }}
                            h5
                                | {{ skill.title }}
                            h6
                                | {{ skill.desc }}
                                //- br
                                //- b kierunek: 
                                //- | {{ skill.kierunek }},<br/>
                                //- b specjalność: 
                                //- | {{ skill.specjalnosc }},<br/>
                                //- b tytul: 
                                //- | {{ skill.tytul }}
    div(v-else)
        b-row
            b-col.text-center
                .timeline-circle.rounded-circle.d-flex.align-items-center.justify-content-center.m-0
                    .timeline-circle-content.text-center
                        i.mb-2.fas(:class="icon")
                        h5.mb-0 {{ title }}
        .timeline-list(class="left")
            b-row.timeline-list-item(v-for="(skill, index) in skills" :key="index")
                b-col
                    .timeline-card.even
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
            title:  {
                type: String,
                default: null
            },
            icon:  {
                type: String,
                default: null
            }
        },
        data () {
            return {
                skills: [
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
                    },
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
                        date: "2007-2009",
                        title: "Uniwersytet Kazimierza Wielkiego w Bydgoszczy",
                        desc: "Wydział Matematyki Techniki i Nauk Przyrodniczych",
                        kierunek: "informatyka",
                        specjalnosc: "informatyka ogólna",
                        tytul: "inżynier"
                    }
                ]
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
        &.left {
            padding-left: 100px;
            &:before {
                left: 100px;
            }

        }
    }
    &-card {
        &.odd {
            padding-right: 15px;
            .timeline-icon {
                right: -12px;
            }
        }
        &.even {
            padding-left: 15px;
            .timeline-icon {
                left: -12px;
            }
        }
        @media (max-width: 767px) {
            padding: 0;
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
@keyframes spin{
    100%{
        transform:rotate(360deg);
    }
}
</style>
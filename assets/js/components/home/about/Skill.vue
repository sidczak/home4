<template lang="pug">
    section.d-flex.flex-shrink-0.align-items-center.section-py-80.bg-light
        b-container
            b-row
                b-col.text-center
                    h2.font-roboto-bold
                        i.fas.fa-fw.fa-tools
                        | Skills
            b-row
                b-col.text-center(v-for="skill in skills")
                    .skill-circle.rounded-circle.d-flex.align-items-center.justify-content-center
                        .skill-circle-content
                            i.mb-2(:class="skill.icon")
                            h5.m-0.text-uppercase
                                | {{ skill.title }}
</template>
<script>    
    export default {
        name: "Skill",
        props: {
        },
        data () {
            return {
                skills: [
                    {
                        icon: "fab fa-symfony",
                        title: 'Symfony',
                    },
                    {
                        icon: "fab fa-vuejs",
                        title: 'Vue',
                    },
                    {
                        icon: "fab fa-bootstrap",
                        title: 'Bootstrap',
                    },
                    {
                        icon: "fab fa-github",
                        title: 'git',
                    }
                ]
            }
        }
    };
</script>
<style lang="scss" scoped>
@import '../../../../css/variables/color.scss';
.skill {
    &-circle {
        border: 10px solid $wet-asphalt;
        position: relative;
        width: 200px;
        height: 200px;
        margin: 3rem auto 0;
        i {
            font-size: 50px;
        }
        &:before {
            content: '';
            position: absolute;
            top: -10px;
            left: -10px;
            right: -10px;
            bottom: -10px;
            border: 10px solid $wet-asphalt;
            border-top-color: transparent;
            border-bottom-color: transparent;
            border-radius: 50%;
            transition: all .3s ease-in-out;
            animation: spin 10s linear infinite;
        }
        &:hover:before {
            border-color: $turquoise;
            border-top-color: transparent;
            border-bottom-color: transparent;
        }
        &-content {
            padding: 0 25px;
        }
    }
}
@keyframes spin{
    100%{
        transform:rotate(360deg);
    }
}
</style>
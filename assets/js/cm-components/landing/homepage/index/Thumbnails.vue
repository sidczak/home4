<template lang="pug">
    b-container.cm-thumbnails
        b-row
            b-col(cols="6")
                h2.cm-thumbnails__title(v-html="$t('vhp.pages.index.thumbnails.title')")
                p.cm-thumbnails__desc(v-html="$t('vhp.pages.index.thumbnails.desc')")
        .thumbnails-wrapper
            Thumb(v-for="thumb in thumbs" :url="thumb.url" :icon="thumb.icon" :title="thumb.title" :desc="thumb.desc" :key="thumb.title")
        .text-center
            a.cm-thumbnails__link(:href="$resolveUrl('HOMEPAGE.video_conferencing')") {{ $t('vhp.pages.index.thumbnails.link') }}
                Arrow
</template>

<script>
import Thumb from '../../common/ProductThumbnail.vue'
import Megaphone from '~/assets/images/product/megaphone.svg?inline'
import SchoolTeacher from '~/assets/images/product/school-teacher.svg?inline'
import TeamMeeting from '~/assets/images/product/team-meeting.svg?inline'
import MovieCinema from '~/assets/images/product/movie-cinema.svg?inline'
import Arrow from '~/assets/images/arrows/down_arrow.svg?inline'

export default {
    components: {
        Thumb,
        Megaphone,
        SchoolTeacher,
        TeamMeeting,
        MovieCinema,
        Arrow,
    },
    data() {
        return {
            thumbs: [
                {
                    url: 'HOMEPAGE.video_conferencing_business',
                    icon: Megaphone,
                    title: this.$t('vhp.pages.index.thumbnails.demo.title'),
                    desc: this.$t('vhp.pages.index.thumbnails.demo.desc')
                },
                {
                    url: 'HOMEPAGE.video_conferencing_courses',
                    icon: SchoolTeacher,
                    title: this.$t('vhp.pages.index.thumbnails.courses.title'),
                    desc: this.$t('vhp.pages.index.thumbnails.courses.desc')
                },
                {
                    url: 'HOMEPAGE.video_conferencing_demo',
                    icon: TeamMeeting,
                    title: this.$t('vhp.pages.index.thumbnails.business.title'),
                    desc: this.$t('vhp.pages.index.thumbnails.business.desc')
                },
                {
                    url: 'HOMEPAGE.video_conferencing_events',
                    icon: MovieCinema,
                    title: this.$t('vhp.pages.index.thumbnails.events.title'),
                    desc: this.$t('vhp.pages.index.thumbnails.events.desc')
                }
            ]
        }
    },
    computed: {
        currentLang() {
            return this.$store.state.i18n.locale
        }
    },

}
</script>

<style lang="scss" scoped>
$time: 0.5s;
$ease: ease-in-out;
$btnColor: #48a90c;
$btnColorHover: #399202;

@keyframes animationArrow {
    50% {
        transform: translate(25%, -50%) rotate(-90deg);
    }
}

.thumbnails-wrapper {
    display: flex;
    align-items: stretch;
    justify-content: space-between;
    margin-bottom: 45px;
    @include md {
        flex-wrap: wrap;
    }
}
.cm-thumbnails {
    margin-top: -120px;
    @include md {
        margin-top: -40px;
    }
    @include sm {
        margin-top: -10px;
    }
    &__title {
        font-weight: 700;
        font-size: 1.5625rem;
        color: $dark-lighter-1;
        @include md {
            display: none;
        }
    }
    &__desc {
        font-size: 0.9375rem;
        color: $ash-darker-1;
        margin-bottom: 30px;
        @include md {
            display: none;
        }
    }
    &__link {
        font-size: 0.9375rem;
        font-weight: 500;
        color: $white;
        background-color: $btnColor;
        transition: background-color $time $ease;
        padding: 14px 90px 14px 25px;
        border-radius: 40px;
        position: relative;
        text: {
            decoration: none;
            transform: uppercase;
            align: left;
        }
        &:hover {
            background-color: $btnColorHover;
            svg {
                animation: animationArrow 1.5s linear infinite;
            }
        }
        svg {
            position: absolute;
            top: 50%;
            right: 15px;
            transition: transform $time $ease;
            transform: translateY(-50%) rotate(-90deg);
            g {
                stroke: $white;
            }
        }
    }
}
</style>

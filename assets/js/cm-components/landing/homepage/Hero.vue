<template lang="pug">
    section.hero.align-items-center(:class="photo")
        b-container(fluid class="h-100")
            b-row(align-v="center" class="h-100")
                b-col(md="6" offset-md="0" lg="5" offset-lg="1")
                    .hero__wrapper
                        h1.hero__title
                            | Inspire, teach, sell with live & automated webinars
                        p.hero__desc
                            | Video conferencing software for product demos, training, online courses, business meetings and webinars.
                        .hero__btn-wrapper
                            .hero__btn-note
                                b-button.text-uppercase(variant="start-free")
                                    | Start for Free
                                p.hero__note
                                    | 30 days. No credit card. Automation included. 
                            b-button.text-uppercase(variant="select-plan")
                                | SEE ALL PLANS
                        //- .hero-scrolls
                        //-     Mouse.hero-scrolls__mouse
                        //-     Arrow.hero-scrolls__arrow
</template>
<script>
    export default {
        name: "Hero",
        props: {
        },
        data () {
            return {
                photo: null,
                photos: ['option1', 'option2', 'option3', 'option4', 'option5'],
            }
        },
        created () {
            const number = Math.floor(Math.random() * this.photos.length)
            this.photo = this.photos[number]
        }
        // mounted() {
        //     window.addEventListener('resize', this.handleResize)
        //     this.handleResize()
        // },
        // destroyed() {
        //     window.removeEventListener('resize', this.handleResize)
        // },
        // methods: {
        //     handleResize() {
        //         if (1200 > window.innerHeight) {
        //             this.swiperSlide = true
        //         } else {
        //             this.swiperSlide = false
        //         }
        //     }
        // }
    };
</script>
<style lang="scss">
.hero {
    display: flex;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    min-height: 750px;
    height: calc(100vh - 56px);
    border: 1px solid red;
    padding: 100px 0;
    @media (max-width: 1200px) {
        height: auto;
        border: 1px solid blue;
    }
    @media (max-width: 991px) {
        border: 1px solid orange;
    }
    @media (max-width: 768px) {
        background-size: contain;
        background-position: bottom;
        padding: 50px 0 550px;
    }
    &.option1 {
        background-image: url('../../../images/landing/homepage/option1.png');
        @media (max-width: 768px) {
            background-image: url('../../../images/landing/homepage/option1-mobile.png');
        }
    }
    &.option2 {
        background-image: url('../../../images/landing/homepage/option2.png');
        @media (max-width: 768px) {
            background-image: url('../../../images/landing/homepage/option2-mobile.png');
        }
    }
    &.option3 {
        background-image: url('../../../images/landing/homepage/option3.png');
        @media (max-width: 768px) {
            background-image: url('../../../images/landing/homepage/option3-mobile.png');
        }
    }
    &.option4 {
        background-image: url('../../../images/landing/homepage/option4.png');
        @media (max-width: 768px) {
            background-image: url('../../../images/landing/homepage/option4-mobile.png');
        }
    }
    &.option5 {
        background-image: url('../../../images/landing/homepage/option5.png');
        @media (max-width: 768px) {
            background-image: url('../../../images/landing/homepage/option5-mobile.png');
        }
    }
    &__wrapper {
        border: 1px solid red;
    }
    &__title {
        font-weight: 700;
        font-size: 62px;
        margin: 0 0 60px;
        @media (max-width: 1200px) {
            font-size: 52px;
        }
        @media (max-width: 991px) {
            font-size: 42px;
        }
    }
    &__desc {
        font-size: 24px;
        margin: 0 0 60px;
        @media (max-width: 1200px) {
            font-size: 20px;
        }
        @media (max-width: 991px) {
            font-size: 16px;
        }
    }
    &__btn-wrapper {
        border: 1px solid red;
    }
    &__btn-note {
        border: 1px solid orange;
        display: inline-block;
        vertical-align: top;
    }
    .btn {
        font-weight: 500;
        font-size: 15px;
        padding:  13px 15px;
        border-radius: 40px;
        box-shadow: none;
        &-start-free {
            background-color: #48a90c;
            color: #fff;
            min-width: 220px;
            &:hover {
                background-color: darken(#48a90c, 5% );
            }
        }
        &-select-plan {
            background-color: #fff;
            min-width: 220px;
            border: 0;
            // box-shadow: 0px 0px 106px 0px rgba($selectPlanShadow, 1);
            &:hover {
                // box-shadow: 0px 0px 106px 0px rgba($selectPlanShadowHover, 1);
            }
        }
    }
}
</style>

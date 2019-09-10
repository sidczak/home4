<template lang="pug">
    section.hero.option1
        b-container(fluid class="h-100")
            b-row(align-v="center" class="h-100")
                b-col(md="6" offset-md="0" lg="5" offset-lg="1")
                    div(style="border: 1px solid red;")
                        h1.hero__title
                            | Inspire, teach, sell with live & automated webinars
                        p.hero__desc
                            | Video conferencing software for product demos, training, online courses, business meetings and webinars.

</template>
<script>
    export default {
        name: "Hero",
        props: {
        },
        data () {
            return {
            }
        }
    };
</script>
<style lang="scss">
.hero {
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    height: calc(100vh - 56px);
    border: 1px solid red;
    padding: 350px 0;
    @media (max-width: 1200px) {
        background-size: 100%;
        padding: 100px 0 100px;
        height: auto;
    }
    @media (max-width: 768px) {
        background-position: bottom;
        padding: 100px 0 550px;
    }
    &.option1 {
        background-image: url('../../../images/landing/homepage/option1.png');
        @media (max-width: 768px) {
            background-image: url('../../../images/landing/homepage/option1-mobile.png');

        }
    }
    &.option2 {
        background-image: url('../../../images/landing/homepage/option2.png');
    }
    &.option3 {
        background-image: url('../../../images/landing/homepage/option3.png');
    }
    &.option4 {
        background-image: url('../../../images/landing/homepage/option4.png');
    }
    &.option5 {
        background-image: url('../../../images/landing/homepage/option5.png');
    }
    &__title {
        font-weight: 700;
        font-size: 3.875rem;
        margin: 0 0 60px;
    }
    &__desc {
        font-size: 1.5rem;
        margin: 0 0 60px;
    }
}
</style>

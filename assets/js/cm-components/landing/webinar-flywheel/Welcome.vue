<template>
    <section class="welcome ring-multi">
        <Ring isMulti></Ring>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 text-center">
                    <h2>{{ heading }}</h2>
                    <h4>{{ description }}</h4>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import Ring from './Ring';
export default {
    name: "Welcome",
    components: {
        Ring
    },
    props: {
    },
    data () {
        return {
            heading: "Welcome",
            description: "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua."
        }
    }
};
</script>

<style lang="scss" scoped>
// $welcomeBg: #edf0f7;
.welcome {
    position: relative;
    padding: 150px 0 600px;
    @media (max-width: 768px) {
        padding: 50px 0 380px;
    }
    &.ring-multi {
        padding-bottom: 700px;
        @media (max-width: 768px) {
            padding-bottom: 470px;
        }
    }
    // &__welcome {
    //     position: relative;
    //     padding: 185px 0 800px;
    //     @include sm {
    //         padding: 85px 0 580px;
    //     }
    //     &:before {
    //         content: '';
    //         background-color: $welcomeBg;
    //         width: 1500px;
    //         height: 725px;
    //         position: absolute;
    //         top: 0;
    //         left: 50%;
    //         transform: translateX(-50%);
    //         border-bottom-right-radius: 100%;
    //         border-bottom-left-radius: 100%;
    //         @include lg-min {
    //             width: 120%;
    //         }
    //         @include sm {
    //             height: 465px;
    //         }
    //     }
    // }
}
</style>

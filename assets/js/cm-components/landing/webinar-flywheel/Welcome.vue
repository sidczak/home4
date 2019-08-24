<template>
    <section class="welcome ring-multi">
        <div class="container welcome__contents">
            <div class="row justify-content-center">
                <div class="col-md-8 text-center">
                    <h2>{{ heading }}</h2>
                    <h4>{{ description }}</h4>
                </div>
            </div>
        </div>
        <div class="welcome__ring-wrapper">
            <Ring isMulti></Ring>
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
$welcomeBg: #edf0f7;
.welcome {
    position: relative;
    padding: 150px 0 600px;
    @media (max-width: 768px) {
        padding: 50px 0 380px;
    }
    &:before {
        background-color: $welcomeBg;
        content: '';
        position: absolute;
        top: 0;
        left: 50%;
        width: 1500px;
        height: 70%;
        transform: translateX(-50%);
        border-bottom-right-radius: 100%;
        border-bottom-left-radius: 100%;
        @media (min-width: 1200px) {
            width: 120%;
        }
        @media (max-width: 767px) {
            height: 80%;
        }
    }
    &__contents {
        position: relative;
        z-index: 1;
    }
    &__ring-wrapper {
        position: absolute;
        left: 50%;
        bottom: 0;
        transform: translateX(-50%);
        width: 660px;
        height: 660px;
        @media (max-width: 768px) {
            width: 420px;
            height: 420px;
        }
    }
    &.ring-multi {
        padding-bottom: 700px;
        @media (max-width: 768px) {
            padding-bottom: 450px;
        }
    }
}
</style>

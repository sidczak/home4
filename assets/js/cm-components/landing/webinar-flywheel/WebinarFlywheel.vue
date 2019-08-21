<template>
    <div class="webinar-flywheel">
        <Welcome></Welcome>
        <Ebook></Ebook>
        <Features></Features>
    </div>
</template>

<script>
    import Welcome from './Welcome';
    import Ebook from './Ebook';
    import Features from './Features';
    
    export default {
        name: "WebinarFlywheel",
        components: {
            Welcome,
            Ebook,
            Features
        },
        props: {

        },
	    data () {
	        return {
	        }
	    }
    };
</script>
<style lang="scss">
$white: #fff;
$webinarFlywheelBg: #fcfdfe;
$btnWebinarFlywheel: #3365ca;
$selectPlanShadow: #e7ebf3;
$selectPlanShadowHover: #dbe0eb;
.webinar-flywheel {
    background: $webinarFlywheelBg;
    position: relative;
    overflow: hidden;
    .btn {
        font-weight: 500;
        font-size: 15px;
        padding:  13px 15px;
        border-radius: 40px;
        box-shadow: none;
        &-e-book,
        &-watch-video,
        &-inspired,
        &-integrations,
        &-start-free {
            background-color: $btnWebinarFlywheel;
            color: $white;
            min-width: 220px;
            &:hover {
                background-color: darken( $btnWebinarFlywheel, 5% );
            }
        }
        &-watch-video {
            position: relative;
            padding: 13px 95px 13px 25px;
        }
        &-inspired {
            min-width: 225px;
        }
        &-integrations {
            min-width: 260px;
        }
        &-select-plan {
            background-color: $white;
            min-width: 220px;
            border: 0;
            box-shadow: 0px 0px 106px 0px rgba($selectPlanShadow, 1);
            &:hover {
                box-shadow: 0px 0px 106px 0px rgba($selectPlanShadowHover, 1);
            }
        }
    }
}
</style>

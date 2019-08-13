<template>
    <div class="webinar-flywheel">
        <Welcome></Welcome>
        <Features></Features>
    </div>
</template>

<script>
    import Welcome from './Welcome';
    import Features from './Features';
    
    export default {
        name: "WebinarFlywheel",
        components: {
            Welcome,
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
<style lang="scss" scoped>
.webinar-flywheel {
    overflow: hidden;
}
</style>
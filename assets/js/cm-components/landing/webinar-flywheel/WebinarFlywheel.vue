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
<style lang="scss" scoped>
.webinar-flywheel {
    overflow: hidden;
}
</style>
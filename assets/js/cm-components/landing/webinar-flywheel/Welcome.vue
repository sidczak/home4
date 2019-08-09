<template>
    <section class="welcome">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>{{ heading }}</h2>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    export default {
        name: "Welcome",
        props: {

        },
	    data () {
	        return {
	            heading: "Welcome"
	        }
	    }
    };
</script>
<style lang="scss" scoped>
.welcome {
    border: 1px solid red;
}
</style>
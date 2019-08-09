<template>
    <section class="features">
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
        name: "Features",
        props: {

        },
	    data () {
	        return {
	            heading: "Features"
	        }
	    }
    };
</script>
<style lang="scss" scoped>
.features {
    border: 1px solid red;
}
</style>
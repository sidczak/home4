<template>
    <div>
        <p>Dynamic prop value: {{ myprop }} {{ heading }} {{ Number(index) + 2 }}</p>
        <h3>Komponent vuetify poniżej:</h3>
    </div>
</template>
<script>
    export default {
        name: "ExampleComponent",
        props: {
        	myprop: String, 
        	index: {
        		type: Number,
        		default: 0
        	}
        },
	    data () {
	        return {
	            heading: "Hello World"
	        }
	    }
    };
</script>
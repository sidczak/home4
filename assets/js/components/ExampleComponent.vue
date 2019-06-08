<template>
  <p>Dynamic prop value: {{ myprop }} {{ heading }} {{ Number(index) + 2 }}</p>
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
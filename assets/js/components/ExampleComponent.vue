<template>
  <p>Dynamic prop value: {{ myprop }} {{ heading }} {{ index + 1 }}</p>
</template>
<script>
    export default {
        name: "ExampleComponent",
        props: ["myprop", "index"],
	    data () {
	        return {
	            heading: "Hello World"
	        }
	    }
    };
</script>
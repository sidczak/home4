<template>
    <div>
        <p>Dynamic prop value: {{ myprop }} {{ heading }} {{ Number(index) + 2 }}</p>
        <h3>Komponent vuetify poniżej:</h3>
        <v-btn color="success">Success</v-btn>
        <v-btn color="error">Error</v-btn>
        <v-btn color="warning">Warning</v-btn>
        <v-btn color="info">Info</v-btn>
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
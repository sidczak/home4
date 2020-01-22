<template lang="pug">
    .about.section-min-vh-100.flex-shrink-0
        section.d-flex.flex-shrink-0.align-items-center.section-pb-80.section-pt-152.section-min-vh-100.section--image.section--image-about-me-ania
            b-container
                b-row
                    b-col.text-white(md="6" offset-md="6")
                        h5.text-uppercase Hi there !
                        vue-typed-js(:strings="['Daria Taylor', 'a photographer', 'a web designer', 'a seo specialist', 'a blogger', 'a freelancer']" :loop="true" :typeSpeed="100" :backSpeed="50" :showCursor="false" :smartBackspace="false")
                            h1.text-uppercase
                                | I'm 
                                span.typing.font-weight-bold.text-success
                        p I'm a Freelance UI/UX Designer and Developer based in London, England. I strives to build immersive and beautiful web applications through carefully crafted code and user-centric design.
                        b-button(href="#" variant="success" size="lg" class="my-2 mr-md-2" pill)
                            | More about me
                        | 
                        b-button(href="#" variant="outline-success" size="lg" class="my-2" pill)
                            | Portfolio
</template>
<script>    
    export default {
        name: "AboutMe",
        props: {
        },
        data () {
            return {
            }
        }
    };
</script>
<style lang="scss" scoped>
.about {}
</style>